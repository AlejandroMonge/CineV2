<?php

namespace App\Http\Controllers;

use App\Favorita;
use App\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class FavoritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $favoritas = Auth::user()->favoritas;
        $favoritePivot = DB::table('favoritas')->where('user_id', Auth::id())->get();
        return view('peliculas.peliculaFavoritas', compact('favoritas'));
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
        $request->merge(['user_id' => Auth::id()]);
        $favorita = new Favorita();
        $favorita->user_id = $request->user_id;
        $favorita->pelicula_id = $request->pelicula_id;
        $favorita->save();

        return redirect()->route('pelicula.index')->with(['Mensaje' => 'Agregada a favoritos']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Favorita  $favorita
     * @return \Illuminate\Http\Response
     */
    public function show(Favorita $favorita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favorita  $favorita
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorita $favorita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favorita  $favorita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorita $favorita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favorita  $favorita
     * @return \Illuminate\Http\Response
     */
    public function destroy($pelicula_id)
    {
        //
        Favorita::where(['user_id' => Auth::id(), 'pelicula_id' => $pelicula_id])->delete();
        return redirect()->route('favorita.index')->with(['Mensaje' => 'Pelicula eliminada de favoritos']);
    }
}
