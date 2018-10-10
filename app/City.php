<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function clients()
    {
        return $this->belongsToMany('App\Client' , 'city_user');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function donationreq()
    {
        return $this->belongsTo('App\Donationreq');
    }

}
