<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialModel extends Model
{
    use HasFactory;
    protected $table = 'testimonials';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){
        return self::select('testimonials.*')
        ->where('is_delete', '=', 0)
        ->orderBy('id', 'desc')
        ->paginate(5);
    }

    static public function getRecordFront(){
        return self::select('testimonials.*')
        ->where('status', '=', 1)
        ->where('is_delete', '=', 0)
        ->orderBy('id', 'desc')
        ->get();
    }

    public function getImage(){
        if(!empty($this->image) && file_exists('upload/testimonials/'.$this->image)){
            return url('upload/testimonials/' . $this->image);
        }else{
            return "";
        }
    }
}
