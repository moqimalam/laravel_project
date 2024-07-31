<?php

namespace App\Http\Controllers;

use App\Models\PageModel;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function pageTable(){
        $data['getRecord'] = PageModel::getRecord();
        return view('backend.page.list', $data);
    }

    public function addPage(){
        return view('backend.page.add');
    }

    public function insertPage(Request $request){
        
        $save = new PageModel;
      
        $save->slug = $request->slug;
        $save->title = $request->title;
        $save->description = $request->description;
        $save->meta_title = $request->meta_title;
        $save->meta_description = $request->meta_description;
        $save->meta_keyword = $request->meta_keyword;
        $save->save();

        return redirect()->route('page')->withInput()->with('success', 'Page Created successful');
    }

    public function editPage($id){
        $data['getRecord'] = PageModel::getSingle($id);
        return view('backend.page.edit', $data);
    }

    public function updatePage($id, Request $request){

        $save = PageModel::getSingle($id);
        $save->slug = $request->slug;
        $save->title = $request->title;
        $save->description = $request->description;
        $save->meta_title = $request->meta_title;
        $save->meta_description = $request->meta_description;
        $save->meta_keyword = $request->meta_keyword;
        $save->save();

        return redirect()->route('page')->withInput()->with('success', 'Page Updated successful');
    
    }
}
