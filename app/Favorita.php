<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorita extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['user_id'];
}

