<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;
    protected $table = 'bookings';

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    

    static public function getRecord(){

        return self::select('bookings.*')
        ->orderBy('id', 'desc')
        ->paginate(20);
        return self::get(); 
    }

    static public function getSingle($id){
        return self::find($id);
    }


}
