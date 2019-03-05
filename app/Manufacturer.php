<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public $table = 'manufacturers';
    public $primary_key = 'id';
    public $timestamps = false;
}
