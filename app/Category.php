<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
