<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'email', 'profile_user_id',
    ];


    public function Profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
