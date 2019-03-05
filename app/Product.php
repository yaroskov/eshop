<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';
    public $primary_key = 'id';
    public $timestamps = false;

//    public function colors()
//    {
//        return $this->hasMany('App\Color');
//    }
}
