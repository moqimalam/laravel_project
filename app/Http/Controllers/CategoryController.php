<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;



class CategoryController extends Controller
{
    public function CategoryTable(){
        $data['getRecord'] = CategoryModel::getRecord();
        return view('backend.category.list', $data);
    }

    public function addCategory(){
        return view('backend.category.add');
    }

    public function insertCategory(Request $request){
        
        request()->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keyword' => 'required|string|max:255',           
        ]);

        $save = new CategoryModel;
        $save->name = $request->name;
        $save->slug = Str::slug($request->name);
        $save->title = $request->title;
        $save->meta_title = $request->meta_title;
        $save->meta_description = $request->meta_description;
        $save->meta_keyword = $request->meta_keyword;
        $save->status = $request->status;
        $save->save();

        return redirect()->route('category')->withInput()->with('success', 'Category Created successful');
    }

    public function editCategory($id){
        $data['getRecord'] = CategoryModel::getSingle($id);
        return view('backend.category.edit', $data);
    }

    public function updateCategory($id, Request $request){

        $save = CategoryModel::getSingle($id);
        $save->name = $request->name;
        $save->slug = Str::slug($request->name);
        $save->title = $request->title;
        $save->meta_title = $request->meta_title;
        $save->meta_description = $request->meta_description;
        $save->meta_keyword = $request->meta_keyword;
        $save->status = $request->status;
        $save->save();

        return redirect()->route('category')->withInput()->with('success', 'Category Updated successful');
    
    }

    public function deleteCategory($id){
        $save = CategoryModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->route('category')->withInput()->with('success', 'Category Deleted successful');
    }


    

}
