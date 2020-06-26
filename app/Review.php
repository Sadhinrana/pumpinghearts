<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function Profile()
    {
        return $this->belongsTo('App\Profile');
    }

    public function Order()
    {
        return $this->belongsTo('App\Order');
    }

}
