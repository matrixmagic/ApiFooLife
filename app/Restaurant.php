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

public function Payments()
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

}
