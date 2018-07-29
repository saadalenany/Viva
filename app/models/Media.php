<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    var $table = 'media';

    var $fillable = ['filename', 'path', 'user_filename', 'imgw', 'imgh',
        'filesize', 'mime', 'hotels_id', 'rooms_details_id', 'mediaType'];

    public function hotel(){
        return $this->belongsTo('App\models\Hotel', 'hotels_id');
    }

    public function room(){
        return $this->belongsTo('App\models\RoomDetails', 'rooms_details_id');
    }
}
