<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    public function peliculas()
    {
        $this->belongsTo(Pelicula::class);
    }

    public function users()
    {
        $this->belongsTo(User::class);
    }
}
