<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($image_id)
 */
class Gallery extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'profile_id', 'location',
    ];


    public function Profile()
    {
        return $this->belongsTo('App\Profile');
    }
}


