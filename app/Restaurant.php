<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = []; 
    
public function Services()
{
    return $this->hasOne('App\RestaurantService');
}

public function PaymentsMethod()
{
    return $this->belongsToMany('App\Payment');
}
public function Currencies()
{
    return $this->belongsToMany('App\Currency');
}

public function Games()
{
    return $this->belongsToMany('App\Game');
}

public function Categories()
{
    return $this->hasMany('App\Category');
}
public function Products()
{
    return $this->hasMany('App\Product');
}

public function File()
{
    return $this->belongsTo('App\File', 'file_id', 'id');
}
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

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Posts()
    {
        return $this->hasMany('App\Post');
    }


    public function Post()
    {
        return $this->hasOne('App\Post');
    }

}
