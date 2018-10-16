<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Client' , 'user_id');
    }
}
