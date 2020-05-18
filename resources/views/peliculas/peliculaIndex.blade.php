@extends('layouts.tema')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table class="table table-striped">
                    <tr>
                        <th>Poster</th>
                        <th>Nombre</th>
                        <th>Puntuacion</th>
                    </tr>
                    @foreach ($peliculas as $pelicula)
                        <tr>
                            <td> <a href="{{ route('pelicula.show', $pelicula->id)}}"> <img src="{{$pelicula->imagen_url}}" alt="" width="98" height="140"> </a> </td>
                            <td> <a href="{{ route('pelicula.show', $pelicula->id)}}"> {{ $pelicula->nombre_pelicula }}</a></td>
                            <td>
                                <h1 class="rating-num"> {{$pelicula->puntaje}} <i style='font-size:24px' class="fas fa-star"></i></h1>
                                <i style='font-size:15px' class='fas fa-child'></i> {{$pelicula->cantidad_votos}} total
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
