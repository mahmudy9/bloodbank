<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    public function clients()
    {
        return $this->belongsToMany('App\Client' , 'blood_user');
    }
}
