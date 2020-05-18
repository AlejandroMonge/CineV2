<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    public $timestamps = false;
    //
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
