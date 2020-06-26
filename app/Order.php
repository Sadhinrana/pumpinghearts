<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


// My orders refer to the customer's order

/**
 * @method static find()
 */
class Order extends Model
{

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'package_id', 'profile_user_id', 'initiated', 'completed',
    ];

    public function Profile()
    {
        return $this->belongsTo('App\Profile');
    }

    public function Package()
    {
        return $this->belongsTo('App\Package');
    }

    public function Review()
    {
        return $this->hasOne('App\Review');
    }
}
