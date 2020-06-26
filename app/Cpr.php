<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cpr extends Model
{

    protected $fillable = [
        'description', 'name', 'profile_user_id',
    ];


    public function Profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
