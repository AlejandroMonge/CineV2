<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Pelicula;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'comentario' => 'required|max:4294967294',
            'puntaje' => 'required|max:5|min:0',
            'user_id' => 'required',
            'pelicula_id' => 'required'


        ]);

        $comentario = new Comentario();

        $comentario->comentario = $request->comentario;
        $comentario->puntaje = $request->puntaje;
        $comentario->nombre_user = $request->nombre_user;
        $comentario->user_id = $request->user_id;
        $comentario->pelicula_id = $request->pelicula_id;
        $comentario->save();
        return redirect()->route('pelicula.show', $request->pelicula_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
