<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


use App\Models\User;
use App\Mail\RegisterMail;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')->withInput()->withErrors($validator);
        }

        $token = Str::random(40);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => $token,
            'role' => $request->role ?? 'user',
        ]);

        Mail::to($request->email)->send(new RegisterMail($user));
        return redirect()->route('register')->with('success', 'Register successful and you need to verify your account!');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendForgotPassword(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        
        if (!$user) {
            return redirect()->back()->with('error', 'Email not Found');
        } else {
            // Your logic for sending the forgot password email goes here
            Mail::to($user->email)->send(new ForgetPasswordMail($user));
            return redirect()->back()->with('success', 'Password reset link sent!');
        }
    }

    public function resetPassword($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            
            $data = [
                'user' => $user,
                'token' => $token
            ];

            return view('auth.reset-password', $data);
        } else {
            abort(404);
        }
    }

    public function postResetPassword($token, Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            $user->password = Hash::make($request->password);
            if (empty($user->email_verified_at)) {
                $user->email_verified_at = now();
            }

            $user->remember_token = Str::random(40);
            $user->save();

            return redirect()->route('login')->with('success', 'Password reset Successfully');
        } else {
            abort(404);
        }
    }

    

    

    public function verifyEmail($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            $user->email_verified_at = now();
            $user->save();

            return redirect()->route('login')->with('success', 'Account Verified Successfully');
        } else {
            abort(404);
        }
    }

    public function authLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Retrieve the authenticated user

            if (!empty($user->email_verified_at)) {
                return redirect()->intended('panel/dashboard'); // Redirect to the intended page
            } else {
                $user = User::find($user->id); // Ensure $user is a User instance

                if ($user) {
                    $user->remember_token = Str::random(40);
                    $user->save();

                    Mail::to($user->email)->send(new RegisterMail($user));
                    Auth::logout(); // Log out the user since they are not verified

                    return redirect()->back()->with('success', 'Please verify your email first');
                } else {
                    return redirect()->back()->with('error', 'User not found');
                }
            }
        } else {
            return redirect()->back()->with('error', 'Please enter correct Email and Password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
