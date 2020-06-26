<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int|null $id)
 */
class Profile extends Model
{
    protected $primaryKey = "user_id";

    protected $fillable = [
        'user_id', 'title', 'category', 'keywords', 'city', 'address' ,'state' ,'zip', 'description', 'phone', 'gender','picture', 'twitter', 'facebook', 'instagram', 'gallery_id', 'timing_id', 'complete', 'distance_preference', 'location_preference', 'cpr', 'tos',
    ];


    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Gallery()
    {
        return $this->hasMany('App\Gallery');
    }

    public function Timing()
    {
        return $this->hasOne('App\Timing');
    }

    public function Category()
    {
        return $this->hasOne('App\Category');
    }

    public function City()
    {
        return $this->hasOne('App\City');
    }

    public function Review()
    {
        return $this->hasMany('App\Review');
    }

    public  function Bookmark()
    {
        return $this->hasMany('App\Bookmark');
    }

    public function Package()
    {
        return $this->hasMany('App\Package');
    }

    public function Cpr()
    {
        return $this->hasMany('App\Cpr');
    }

    public function Payment()
    {
        return $this->hasOne('App\Payment');
    }

    public function Order()
    {
        return $this->hasMany('App\Order');
    }


}
