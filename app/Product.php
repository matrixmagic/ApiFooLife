<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = []; 

    public function Image()
    {
        return $this->belongsTo('App\File');
    }

    public function File()
    {
        return $this->belongsTo('App\File', 'file_id', 'id');
    }

    public function Restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }


    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    

  public function ProductExtra()
  {
      return $this->hasMany('App\ProductExtra');
  }
    
}
