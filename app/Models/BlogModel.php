<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;




class BlogModel extends Model
{
    use HasFactory;

    protected $table = 'blog';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){
        $query = self::select('blog.*', 'users.name as user_name', 'category.name as category_name')
            ->join('users', 'users.id', '=', 'blog.user_id')
            ->join('category', 'category.id', '=', 'blog.category_id');

        if(!empty(Auth::check()) &&  Auth::user()->role != 'admin'){
            $query = $query->where('blog.user_id', '=', Auth::user()->id);
        }

        if (!empty(Request::get('id'))) {
            $query = $query->where('blog.id', '=', Request::get('id'));
        }
        if (!empty(Request::get('user_name'))) {
            $query = $query->where('users.name', 'like', '%'.Request::get('user_name').'%');
        }
        if (!empty(Request::get('title'))) {
            $query = $query->where('blog.title', 'like', '%'.Request::get('title').'%');
        }
        if (!empty(Request::get('category'))) {
            $query = $query->where('category.name', 'like', '%'.Request::get('category').'%');
        } 
        if (!empty(Request::get('is_publish'))) {
            $is_publish = Request::get('is_publish');
            if($is_publish == 100){
                $is_publish = 0;
            }
            $query = $query->where('blog.is_publish', '=', $is_publish);
        }

        if (!empty(Request::get('status'))) {
            $status = Request::get('status');
            if($status == 100){
                $status = 0;
            }
            $query = $query->where('blog.status', '=', $status);
        }

        if (!empty(Request::get('start_date'))) {
            $query = $query->whereDate('blog.created_at', '>=', Request::get('start_date'));
        } 
        if (!empty(Request::get('end_date'))) {
            $query = $query->whereDate('blog.created_at', '<=', Request::get('end_date'));
        } 

        $query = $query->where('blog.is_delete', '=', 0)
            ->orderBy('blog.id', 'desc');

        $return = $query->paginate(5);
        return $return;
    }

    public function getImage(){
        if(!empty($this->image_file) && file_exists('upload/blog/'.$this->image_file)){
            return url('upload/blog/' . $this->image_file);
        }else{
            return "";
        }
    }

    public function getTag(){
        return $this->hasMany(BlogTags::class, 'blog_id');
    }

    static public function getRecordFront(){
        $query = self::select('blog.*', 'users.name as user_name', 'category.name as category_name')
            ->join('users', 'users.id', '=', 'blog.user_id')
            ->join('category', 'category.id', '=', 'blog.category_id');

            if(!empty(Request::get('q'))){
                $return = $query->where('blog.title', 'like', '%'.Request::get('q').'%');
            }

            $return = $query->where('blog.is_publish', '=', 1)
            ->where('blog.status', '=', 1)
            ->where('blog.is_delete', '=', 0)
            ->orderBy('blog.id', 'desc');

        $return = $query->paginate(6);
        return $return;
    }

    static public function getRecordSlug($slug){
        $query = self::select('blog.*', 'users.name as user_name', 'category.name as category_name')
            ->join('users', 'users.id', '=', 'blog.user_id')
            ->join('category', 'category.id', '=', 'blog.category_id')
            ->where('blog.is_publish', '=', 1)
            ->where('blog.status', '=', 1)
            ->where('blog.is_delete', '=', 0)
            ->where('blog.slug', '=', $slug)
            ->first();
        
        return $query;
    }

    static public function getRecentPost(){
        $query = self::select('blog.*', 'users.name as user_name', 'category.name as category_name')
            ->join('users', 'users.id', '=', 'blog.user_id')
            ->join('category', 'category.id', '=', 'blog.category_id')
            ->where('blog.is_publish', '=', 1)
            ->where('blog.status', '=', 1)
            ->where('blog.is_delete', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->limit(3)
            ->get();
        
        return $query;
    }

    static public function getRelatedPost($category_id, $id){
        $query = self::select('blog.*', 'users.name as user_name', 'category.name as category_name')
        ->join('users', 'users.id', '=', 'blog.user_id')
        ->join('category', 'category.id', '=', 'blog.category_id')
        ->where('blog.id', '!=', $id)
        ->where('blog.category_id', '=', $category_id)
        ->where('blog.is_publish', '=', 1)
        ->where('blog.status', '=', 1)
        ->where('blog.is_delete', '=', 0)
        ->orderBy('blog.id', 'desc')
        ->limit(5)
        ->get();
    
    return $query;
    }

    // Moqim
    public static function getPostsByCategory($categoryId){
        $query = self::select('blog.*', 'users.name as user_name', 'category.name as category_name')
        ->join('users', 'users.id', '=', 'blog.user_id')
        ->join('category', 'category.id', '=', 'blog.category_id')
        ->where('blog.category_id', '=', $categoryId)
        ->where('blog.is_publish', '=', 1)
        ->where('blog.status', '=', 1)
        ->where('blog.is_delete', '=', 0)
        ->orderBy('blog.id', 'desc');
        return $query->paginate(6);
    }

    static public function getSlug($slug){
        return self::select('blog.*')
        ->where('slug', '=', $slug)
        ->where('status', '=', 1)
        ->where('is_delete', '=', 0)
        ->first();
    }

    #Moqim ends

    public function getComment(){
        return $this->hasMany(BlogCommentModel::class, 'blog_id')->orderBy('blog_comment.id', 'desc');
    }

    public function getCommentCount(){
        return $this->hasMany(BlogCommentModel::class, 'blog_id')->count();
    }

    

}
