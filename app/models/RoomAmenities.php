<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05/08/18
 * Time: 05:26 م
 */

namespace App\models;


use Illuminate\Database\Eloquent\Model;

class RoomAmenities extends Model
{

    var $table = 'room_amenities';

    var $fillable = ['created_at', 'updated_at', 'name', 'rooms_details_id', 'amenities_id'];

    public function amenities(){
        return $this->belongsTo('App\models\Amenities','amenities_id');
    }

    public function room_details(){
        return $this->belongsTo('App\models\RoomDetails','rooms_details_id');
    }

}