<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StorageCapacity extends Model
{
    public $table = 'storage_capacity';
    public $primary_key = 'id';
    public $timestamps = false;
}
