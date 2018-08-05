<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class RoomDetails extends Model
{
    var $table = 'rooms_details';

    var $fillable = ['hotels_id', 'num_of_beds', 'price_per_night', 'descr',
        'num_of_rooms', 'num_of_free_rooms', 'isActive', 'num_of_kids', 'num_of_adult'];

    public function hotel(){
        return $this->belongsTo('App\models\Hotel', 'hotels_id');
    }

    public function media(){
        return $this->hasMany('App\models\Media', 'rooms_details_id');
    }

    public function room_amenities(){
        return $this->hasMany('App\models\RoomAmenities','rooms_details_id');
    }
}
