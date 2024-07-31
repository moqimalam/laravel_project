<?php

namespace App\Http\Controllers;

use App\Models\GalleryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class GalleryController extends Controller
{
    public function galleryTable(){
        $data['getRecord'] = GalleryModel::getRecord();
        return view('backend.gallery.list',$data);
    }

    public function addGallery(){
        return view('backend.gallery.add');
    }

    public function insertGallery(Request $request){

        $request->validate([
            'title' => 'required|string|max:255',
            'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required'
        ]);

        $save = new GalleryModel;
        $save->title = $request->title;
        $save->class = $request->class;
        $save->status = $request->status;
        

        if (!empty($request->hasFile('gallery_image'))){
            $file = $request->file('gallery_image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/gallery/', $imageName);
            $save->gallery_image = $imageName;
        }
        $save->save();

        return redirect()->route('gallery_back')->withInput()->with('success', 'Gallery Created successful');
    }

    public function editGallery($id){
        $data['getRecord'] = GalleryModel::getSingle($id);
        return view('backend.gallery.edit', $data);
    }

    public function updateGallery($id, Request $request){

        $save = GalleryModel::getSingle($id);
        $save->title = $request->title;
        $save->class = $request->class;
        $save->status = $request->status;

        if (!empty($request->hasFile('gallery_image'))){

            if(!empty($save->getImage())){
                unlink('upload/gallery/'.$save->gallery_image);
            }

            $file = $request->file('gallery_image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/gallery/', $imageName);
            $save->gallery_image = $imageName;
        }
        $save->save();

        return redirect()->route('gallery_back')->with('success', 'Gallery Image Updated successful');


    }

    public function deleteGallery($id){
        $save = GalleryModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->route('gallery_back')->with('success', 'Gallery Image Deleted successful');
    }


}
