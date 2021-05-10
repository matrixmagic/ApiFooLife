<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;

class Product extends Model
{
    protected $guarded = []; 
    protected $appends = ['likes_count'];

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

public function Happytime()
{
    return $this->hasOne('App\Happytime');
}
public function getLikesCountAttribute()
    {
        return Like::where('product_id',$this->id)->count();
    }
  
    
}
