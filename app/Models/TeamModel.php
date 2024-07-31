<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamModel extends Model
{
    use HasFactory;
    protected $table = 'teams';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){
        return self::select('teams.*')
        ->where('is_delete', '=', 0)
        ->orderBy('id', 'desc')
        ->paginate(5);
    }

    static public function getRecordFront(){
        return self::select('teams.*')
        ->where('status', '=', 1)
        ->where('is_delete', '=', 0)
        ->orderBy('id', 'desc')
        ->get();
    }

    public function getImage(){
        if(!empty($this->team_image) && file_exists('upload/team/'.$this->team_image)){
            return url('upload/team/' . $this->team_image);
        }else{
            return "";
        }
    }
}
