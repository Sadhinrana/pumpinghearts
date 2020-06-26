<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function Profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
