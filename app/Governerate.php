<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Governerate extends Model
{

    public function clients()
    {
        return $this->belongsToMany('App\Client' , 'governerate_user');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function donationreq()
    {
        return $this->belongsTo('App\Donationreq');
    }

    public function cities()
    {
        return $this->hasMany('App\City');
    }

}
