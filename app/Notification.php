<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function clients()
    {
        return $this->belongsToMany('App\Client' , 'client_notification');
    }


    public function donationreq()
    {
        return $this->belongsTo('App\Donationreq');
    }

}
