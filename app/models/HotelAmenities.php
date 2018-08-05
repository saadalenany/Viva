<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05/08/18
 * Time: 06:18 م
 */

namespace App\models;


use Illuminate\Database\Eloquent\Model;

class HotelAmenities extends Model
{

    var $table = 'hotel_amenities';

    var $fillable = ['created_at', 'updated_at', 'hotels_id', 'name', 'amenities_id'];

    public function hotel(){
        return $this->belongsTo('App\models\Hotel', 'hotels_id');
    }

    public function amenities(){
        return $this->belongsTo('App\models\Amenities', 'amenities_id');
    }

}
