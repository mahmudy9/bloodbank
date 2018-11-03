<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    public function clients()
    {
        return $this->belongsToMany('App\Client' , 'blood_user' , 'blood_id' , 'user_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function donationreqs()
    {
        return $this->hasMany('App\Donationreq');
    }
}
