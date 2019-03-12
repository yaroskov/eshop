<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public $table = 'sections';
    public $primary_key = 'id';
    public $timestamps = false;
}
