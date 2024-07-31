<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    use HasFactory;

    protected $table = 'gallery_image';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){
        return self::select('gallery_image.*')
        ->where('is_delete', '=', 0)
        ->orderBy('id', 'desc')
        ->paginate(5);
    }

    static public function getRecordFront(){
        return self::select('gallery_image.*')
        ->where('status', '=', 1)
        ->where('is_delete', '=', 0)
        ->orderBy('id', 'desc')
        ->get();
    }

    public function getImage(){
        if(!empty($this->gallery_image) && file_exists('upload/gallery/'.$this->gallery_image)){
            return url('upload/gallery/' . $this->gallery_image);
        }else{
            return "";
        }
    }
}
