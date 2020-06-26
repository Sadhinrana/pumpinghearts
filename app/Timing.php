<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    protected $primaryKey = "profile_user_id";

    protected $fillable = [
        'profile_id', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday',
    ];


    public function Profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
