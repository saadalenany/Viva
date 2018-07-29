<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    var $table = 'cities';

    var $fillable = ['name', 'countries_code'];

    public function country(){
        return $this->belongsTo('App\models\Country', 'countries_code', 'code');
    }

    public function hotels(){
        return $this->hasMany('App\model\Hotel', 'cities_id');
    }

}
