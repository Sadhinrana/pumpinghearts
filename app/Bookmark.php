<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find()
 */
class Bookmark extends Model
{
    public function Profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
