<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
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

    public function governerate()
    {
        return $this->hasOne('App\Governerate');
    }

    public function city()
    {
        return $this->hasOne('App\City');
    }
}
