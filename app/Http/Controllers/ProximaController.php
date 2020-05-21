<?php

namespace App\Http\Controllers;

use App\Proxima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProximaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $proximas = Auth::user()->proximas;

        return view('peliculas.peliculaProximas', compact('proximas'));

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
        $proxima = new Proxima();
        $proxima->user_id = Auth::id();
        $proxima->pelicula_id = $request->pelicula_id;
        $proxima->save();

        return redirect()->route('pelicula.index')->with(['Mensaje' => 'Agregada a Proximas a ver']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proxima  $proxima
     * @return \Illuminate\Http\Response
     */
    public function show(Proxima $proxima)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proxima  $proxima
     * @return \Illuminate\Http\Response
     */
    public function edit(Proxima $proxima)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proxima  $proxima
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proxima $proxima)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proxima  $proxima
     * @return \Illuminate\Http\Response
     */
    public function destroy($pelicula_id)
    {
        //
        Proxima::where(['user_id' => Auth::id(), 'pelicula_id' => $pelicula_id])->delete();
        return redirect()->route('favorita.index')->with(['Mensaje' => 'Pelicula eliminada de favoritos']);
    }
}
