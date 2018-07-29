<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    var $table = 'countries';

    var $fillable = ['code', 'name'];

    public function cities()
    {
        return $this->hasMany('App\models\City', 'countries_code');
    }
}
