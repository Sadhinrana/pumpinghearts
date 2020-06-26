<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class Package extends Model
{
    public function Profile()
    {
        return $this->belongsTo('App\Profile');
    }

    public function Order()
    {
        return $this->hasMany('App\Order');
    }
}
