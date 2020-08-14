<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = []; 

    public function Likes()
    {
        return $this->hasMany('App\Like');
    }
    public function Views(){

        return $this->hasMany('App\View');

    }
    public function Favourites(){

        return $this->hasMany('App\Favourite');

    }
}
