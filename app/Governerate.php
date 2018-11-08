<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Governerate extends Model
{

    public function clients()
    {
        return $this->belongsToMany('App\Client' , 'governerate_user' , 'governerate_id' , 'user_id');
    }

    public function donationreqs()
    {
        return $this->hasMany('App\Donationreq');
    }

    public function cities()
    {
        return $this->hasMany('App\City');
    }

}
