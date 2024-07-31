<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\BlogTags;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    public function blogTable(){
        $data['getRecord'] = BlogModel::getRecord();
        return view('backend.blog.list', $data);
    }

    public function addBlog(){
        $data['getCategory'] = CategoryModel::getCategory();
        return view('backend.blog.add', $data);
    }

    public function insertBlog(Request $request){

        $save = new BlogModel;
        $save->user_id = Auth::user()->id;
        $save->title = $request->title;
        $save->category_id = $request->category_id;
        $save->description = $request->description;
        $save->meta_title = $request->meta_title;
        $save->meta_description = $request->meta_description;
        $save->meta_keyword = $request->meta_keyword;
        $save->is_publish = $request->is_publish;
        $save->status = $request->status;
        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = BlogModel::where('slug', '=', $slug)->first();

        if(!empty($checkSlug)){
            $dbslug = Str::slug($request->title).'-'.$save->id;
        }else{
            $dbslug = $slug;
        }
        $save->slug = $dbslug;

        if(!empty($request->file('image_file'))) {
            
            $ext = $request->file('image_file')->getClientOriginalExtension();
            $file = $request->file('image_file');
            $filename = $dbslug.'.'.$ext;
            $file->move('upload/blog/', $filename);
            $save->image_file = $filename;
        }
        $save->save();

        BlogTags::InsertDeleteTag($save->id, $request->tag);

        return redirect()->route('blog')->with('success', 'Blog Created successful');
    }

    public function editBlog($id){
        $data['getCategory'] = CategoryModel::getCategory();
        $data['getRecord'] = BlogModel::getSingle($id);
        return view('backend.blog.edit', $data);
    }

    public function updateBlog($id, Request $request){

        $save = BlogModel::getSingle($id);

        $save->title = $request->title;
        $save->category_id = $request->category_id;
        $save->description = $request->description;
        $save->meta_title = $request->meta_title;
        $save->meta_description = $request->meta_description;
        $save->meta_keyword = $request->meta_keyword;
        $save->is_publish = $request->is_publish;
        $save->status = $request->status;

        $slug = Str::slug($request->title);

        if(!empty($request->file('image_file'))) {

            if(!empty($save->getImage())){
                unlink('upload/blog/'.$save->image_file);
            }
            
            $ext = $request->file('image_file')->getClientOriginalExtension();
            $file = $request->file('image_file');
            $filename = $slug.'.'.$ext;
            $file->move('upload/blog/', $filename);
            $save->image_file = $filename;
        }
        $save->save();

        BlogTags::InsertDeleteTag($save->id, $request->tag);

        return redirect()->route('blog')->with('success', 'Blog Updated successful');


    }

    public function deleteBlog($id){
        $save = BlogModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->route('blog')->with('success', 'Blog Deleted successful');
    }

    
}
