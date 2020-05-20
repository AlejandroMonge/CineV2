<?php

namespace App\Http\Controllers;

use App\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'puntaje' => 'required|max:5|min:1',
            'user_id' => 'required',
            'pelicula_id' => 'required'
        ]);


        $comentario = new Comentario();

        $pelicula = DB::table('peliculas')->where('id', $request->pelicula_id)->first();

       if($pelicula->cantidad_votos == 0){
           $nuevo_puntaje = $request->puntaje;
       }
       else{
           $nuevo_puntaje = (($pelicula->puntaje * $pelicula->cantidad_votos) + $request->puntaje)/($pelicula->cantidad_votos + 1);
       }


        DB::table('peliculas')->where('id', $request->pelicula_id)->update(array('puntaje' => $nuevo_puntaje, 'cantidad_votos' => $pelicula->cantidad_votos + 1));

        $comentario->comentario = $request->comentario;
        $comentario->puntaje = $request->puntaje;
        $comentario->nombre_user = $request->nombre_user;
        $comentario->user_id = $request->user_id;
        $comentario->pelicula_id = $request->pelicula_id;



        $comentario->save();
        return redirect()->route('pelicula.show', $request->pelicula_id)->with(['Mensaje' => 'Comentario agregado correctamente']);

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
