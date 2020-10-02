<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = []; 
    public function Image()
    {
        return $this->belongsTo('App\File','file_id', 'id');
    }

}
