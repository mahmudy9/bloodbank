<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donationreq extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function governerate()
    {
        return $this->hasOne('App\Governerate');
    }

    public function city()
    {
        return $this->hasOne('App\City');
    }

    public function blood()
    {
        return $this->belongsTo('App\Blood');
    }

    public function notification()
    {
        return $this->hasOne('App\Notification');
    }

}
