<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'users';

    protected $fillable = ['name', 'email'];
}
