<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use Illuminate\Http\Request;


class BookingController extends Controller
{
    public function showForm()
    {
        $data['getRecord'] = BookingModel::getRecord();
        return view('backend.bookings.list',$data);
    }

    public function storeBooking(Request $request){
       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:bookings,email',
            'phone' => ['required', 'regex:/^[0-9]{10,15}$/'],
        ]);
    
        BookingModel::create($request->all());
        return redirect()->back()->with('success', 'Your seat has been booked!');

    }

    public function deleteBooking($id){
        $save = BookingModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->route('category')->withInput()->with('success', 'Category Deleted successful');
    }

}
