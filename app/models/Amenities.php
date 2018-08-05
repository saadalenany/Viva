<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05/08/18
 * Time: 05:23 م
 */

namespace App\models;


use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    var $table = 'amenities';

    var $fillable = ['name', 'name_ar', 'created_at', 'updated_at', 'type'];

    public function room_amenities(){
        return $this->hasMany('App\models\RoomAmenities','amenities_id');
    }

    public function hotel_amenities(){
        return $this->hasMany('App\models\HotelAmenities','amenities_id');
    }

}