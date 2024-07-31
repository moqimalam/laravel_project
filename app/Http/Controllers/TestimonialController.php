<?php

namespace App\Http\Controllers;

use App\Models\TestimonialModel;
use Illuminate\Http\Request;


class TestimonialController extends Controller
{
    public function testimonialTable(){
        $data['getRecord'] = TestimonialModel::getRecord();
        return view('backend.testimonial.list',$data);
    }

    public function addTestimonial(){
        return view('backend.testimonial.add');
    }

    public function insertTestimonial(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'profession' => 'required|string|max:255',
            'message' => 'required',
            'status' => 'required'
        ]);

        $save = new TestimonialModel;
        $save->name = $request->name;
        $save->profession = $request->profession;
        $save->message = $request->message;
        $save->status = $request->status;
        

        if (!empty($request->hasFile('image'))){
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/testimonials/', $imageName);
            $save->image = $imageName;
        }
        $save->save();

        return redirect()->route('testimonial')->withInput()->with('success', 'Testimonial Created successful');
    }

    public function editTestimonial($id){
        $data['getRecord'] = TestimonialModel::getSingle($id);
        return view('backend.testimonial.edit', $data);
    }

    public function updateTestimonial($id, Request $request){

        $save = TestimonialModel::getSingle($id);
        $save->name = $request->name;
        $save->profession = $request->profession;
        $save->message = $request->message;
        $save->status = $request->status;

        if (!empty($request->hasFile('image'))){

            if(!empty($save->getImage())){
                unlink('upload/testimonials/'.$save->team_image);
            }

            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/testimonials/', $imageName);
            $save->image = $imageName;
        }
        $save->save();

        return redirect()->route('testimonial')->with('success', 'Testimonial Updated successful');


    }

    public function deleteTestimonial($id){
        $save = TestimonialModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->route('testimonial')->with('success', 'Testimonial Deleted successful');
    }
}
