<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function clients()
    {
        return $this->belongsToMany('App\Client' , 'city_user' , 'city_id' , 'user_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function donationreq()
    {
        return $this->hasMany('App\Donationreq');
    }

    public function governerate()
    {
        return $this->belongsTo('App\Governerate');
    }

}
