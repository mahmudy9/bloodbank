<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function clients()
    {
        return $this->belongsToMany('App\Client' , 'city_user' , 'city_id' , 'user_id');
    }

    public function clientss()
    {
        return $this->hasMany('App\Client');
    }

    public function donationreqs()
    {
        return $this->hasMany('App\Donationreq');
    }

    public function governerate()
    {
        return $this->belongsTo('App\Governerate');
    }

}
