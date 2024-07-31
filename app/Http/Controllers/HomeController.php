<?php

namespace App\Http\Controllers;

use App\Models\BlogCommentModel;
use App\Models\BlogCommentReplyModel;
use App\Models\BlogModel;
use App\Models\BookingModel;
use App\Models\CategoryModel;
use App\Models\GalleryModel;
use App\Models\PageModel;
use App\Models\TeamModel;
use App\Models\TestimonialModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class HomeController extends Controller
{
    public function index(){
        $getPage = PageModel::getSlug("home");
        $data['getRecordFront'] = TestimonialModel::getRecordFront();
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : "Kid Kinder Home";
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : "Kid Kinder Home";
        $data['meta_keyword'] = !empty($getPage) ? $getPage->meta_keyword : "Kid Kinder Home";
        
        return view('home',$data);
    }

    public function about(){
        $data['getRecordFront'] = TeamModel::getRecordFront();
        $getPage = PageModel::getSlug("about");
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : "Kid Kinder Home";
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : "Kid Kinder Home";
        $data['meta_keyword'] = !empty($getPage) ? $getPage->meta_keyword : "Kid Kinder Home";
        return view('about', $data);
    }
    public function teams(){
        $data['getRecordFront'] = TeamModel::getRecordFront();
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : "Kid Kinder Home";
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : "Kid Kinder Home";
        $data['meta_keyword'] = !empty($getPage) ? $getPage->meta_keyword : "Kid Kinder Home";
        return view('teams', $data);
    }
    public function gallery(){
        $data['getRecordFront'] = GalleryModel::getRecordFront();
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : "Kid Kinder Home";
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : "Kid Kinder Home";
        $data['meta_keyword'] = !empty($getPage) ? $getPage->meta_keyword : "Kid Kinder Home";
        return view('gallery', $data);
    }
    
    public function frontBlog(){
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : "Kid Kinder Home";
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : "Kid Kinder Home";
        $data['meta_keyword'] = !empty($getPage) ? $getPage->meta_keyword : "Kid Kinder Home";
        $data['getRecord'] = BlogModel::getRecordFront();
        return view('blog', $data);
    }

    public function singleBlog($slug){
        $getSlugBlog = BlogModel::getSlug($slug);
        $getRecord = BlogModel::getRecordSlug($slug);

        if(!empty($getRecord)){
            $data['meta_title'] = $getSlugBlog->meta_title;
            $data['meta_description'] = $getSlugBlog->meta_description;
            $data['meta_keyword'] = $getSlugBlog->meta_keyword;

            $data['getCategory'] = CategoryModel::getCategory();
            $data['getRecentPost'] = BlogModel::getRecentPost();
            $data['getRelatedPost'] = BlogModel::getRelatedPost($getRecord->id, $getRecord->id);
            $data['getRecord'] = $getRecord;
            return view('blog_detail', $data);
        }else{
            abort(404);
        }
        
    }
    // Moqim
    public function category($slug){
        $getSlugCategory = CategoryModel::getSlug($slug);
        if ($getSlugCategory) {
            $data['meta_title'] = $getSlugCategory->meta_title;
            $data['meta_description'] = $getSlugCategory->meta_description;
            $data['meta_keyword'] = $getSlugCategory->meta_keyword;
            
            $data['category'] = $getSlugCategory;
            $data['posts'] = BlogModel::getPostsByCategory($getSlugCategory->id);
            
            return view('category', $data);
        } else {
            abort(404); // or redirect to a not found page
        }
    }

    // Moqim end

    public function contact(){
        $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : "Kid Kinder Home";
        $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : "Kid Kinder Home";
        $data['meta_keyword'] = !empty($getPage) ? $getPage->meta_keyword : "Kid Kinder Home";
        return view('contact');
    }

    public function commentBlog(Request $request){

        $save = new BlogCommentModel();
        $save->user_id = Auth::user()->id;
        $save->blog_id = $request->blog_id;
        $save->comment = $request->comment;
        $save->save();

        return redirect()->back()->with('success', 'Category Created successful');

    }

    public function replyBlog(Request $request){

        $save = new BlogCommentReplyModel();
        $save->user_id = Auth::user()->id;
        $save->comment_id = $request->comment_id;
        $save->comment = $request->comment;
        $save->save();

        return redirect()->back()->with('success', 'Category Created successful');

    }

    // public function storeBooking(Request $request){
    //     dd($request->all);
    //     die();
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:bookings,email',
    //         'phone' => ['required', 'regex:/^[0-9]{10,15}$/'],
    //     ]);

    //     $save = new BookingModel();
    //     $save->name = $request->name;
    //     $save->email = $request->email;
    //     $save->phone = $request->phone;
    //     $save->save();

    //     return redirect()->back()->with('success', 'Your seat has been booked!');

    // }
    

    
}
