<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $hidden= ['password' , 'api_token'];

    public function cities()
    {
        return $this->belongsToMany('App\City','city_user');
    }

    public function governerates()
    {
        return $this->belongsToMany('App\Governerate' , 'governerate_user');
    }

    public function bloods()
    {
        return $this->belongsToMany('App\Blood' , 'blood_user');
    }

    public function city()
    {
        return $this->hasOne('App\City');
    }

    public function blood()
    {
        return $this->hasOne('App\Blood');
    }

    public function contacts()
    {
        return $this->hasMany('App\Contacts' , 'user_id');
    }

    public function reports()
    {
        return $this->hasMany('App\Report' , 'user_id');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification' , 'user_id');
    }


    public function donationreqs()
    {
        return $this->hasMany('App\Donationreq' , 'client_id');
    }

}
