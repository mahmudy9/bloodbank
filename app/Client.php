<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{

    use Notifiable;

    protected $hidden= ['password' , 'api_token'];

    public function cities()
    {
        return $this->belongsToMany('App\City','city_user' , 'user_id' , 'city_id');
    }

    public function governerates()
    {
        return $this->belongsToMany('App\Governerate' , 'governerate_user' , 'user_id' , 'governerate_id');
    }

    public function bloods()
    {
        return $this->belongsToMany('App\Blood' , 'blood_user' , 'user_id' , 'blood_id');
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
        return $this->belongsToMany('App\Notification' , 'client_notification');
    }


    public function donationreqs()
    {
        return $this->hasMany('App\Donationreq' , 'client_id');
    }

    public function clientreset()
    {
        return $this->hasOne('App\Clientreset');
    }

}
