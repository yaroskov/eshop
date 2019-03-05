<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $table = 'colors';
    public $primary_key = 'id';
    public $timestamps = false;

//    public function products()
//    {
//        return $this->belongsTo('App\Products');
//    }
}
