<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        //
        $peliculas = Pelicula::all();
        $userID = Auth::id();
        $admin = false;

        if($userID == 1){
            $admin = true;
        }

        return view('peliculas.peliculaIndex', compact('peliculas', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('peliculas.peliculaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelicula = new Pelicula();
        //$informacion_basica = $request->anio . ' - ' . $request->genero . ' - ' . $request->duracion;

        $pelicula->nombre_pelicula = $request->nombre_pelicula;
        $pelicula->imagen_url = $request->imagen_url;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->url_trailer = $request->url_trailer;
        $pelicula->anio = $request->anio;
        $pelicula->genero = $request->genero;
        $pelicula->duracion = $request->duracion;
        //$pelicula->informacion_basica = $informacion_basica;

        $pelicula->save();
        return redirect()->route('pelicula.index')->with(['Mensaje' => 'Pelicula añadida correctamente']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        //

        /* $comentarios = Comentario::where('pelicula_id','=', $pelicula->id); */
        $comentarios = DB::table('comentarios')->where('pelicula_id', '=', $pelicula->id)->get();
        $userID = Auth::id();
        $admin = false;

        if($userID == 1){
            $admin = true;
        }

        return view('peliculas.peliculaShow', compact('pelicula', 'comentarios', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelicula $pelicula)
    {
        //
        return view('peliculas.peliculaForm', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula $pelicula)
    {
        //
        $pelicula->delete();
        return redirect()->route('pelicula.index')->with(['Mensaje' => 'Pelicula eliminada correctamente']);
    }
}
