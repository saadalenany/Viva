<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    var $table = 'hotels';

    var $fillable = ['cities_id', 'name', 'num_of_rooms', 'num_of_free_rooms',
        'num_rooms_types', 'lat', 'lng', 'address', 'descr',
        'contact_email','contact_phone','contact_site',
        'class', 'stars', 'min_price', 'max_price', 'isActive', 'tags', 'tip'];


    public function media(){
        return $this->hasMany('App\models\Media', 'hotels_id');
    }

    public function city(){
        return $this->belongsTo('App\models\City', 'cities_id');
    }

    public function rooms_details(){
        return $this->hasMany('App\models\RoomDetails', 'hotels_id');
    }

    public function hotel_amenities(){
        return $this->hasMany('App\models\HotelAmenities', 'hotels_id');
    }

}
