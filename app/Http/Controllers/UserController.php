<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function userTable(){
        $data['getRecord'] = User::getRecordUser();
        return view('backend.user.list', $data);
    }

    public function addUser(){

        return view('backend.user.add');
    }

    public function insertUser(Request $request){
        
        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $save = new User;
        $save->name = $request->name;
        $save->email = $request->email;
        $save->password = Hash::make($request->password);
        $save->status = $request->status;
        $save->save();

        return redirect()->route('user')->withInput()->with('success', 'User Created successful');
    }

    public function editUser($id){
        $data['getRecord'] = User::getSingle($id);
        return view('backend.user.edit', $data);
    }

    public function updateUser($id, Request $request){

        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id
        ]);
        
        $save = User::getSingle($id);
        $save->name = $request->name;
        $save->email = $request->email;
        if(!empty($request->password)){
            $save->password = Hash::make($request->password);
        }
        
        $save->status = $request->status;
        $save->save();

        return redirect()->route('user')->withInput()->with('success', 'User Updated successful');
    }

    public function deleteUser($id){
        $save = User::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->route('user')->withInput()->with('success', 'User Deleted successful');
    }
}
