<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsCount extends Model
{
    public $table = 'products_count';
    public $primary_key = 'id';
    public $timestamps = false;
}
