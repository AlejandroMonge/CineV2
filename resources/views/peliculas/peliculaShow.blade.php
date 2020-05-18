@extends('layouts.tema')

{{-- {{use Illuminate\Support\Facades\DB;}} --}}

@section('content')
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.rating-box .ratings .fa{
  font-size: 30px;
  color:#FF9800;
  float: left;
  cursor: pointer;
}

.comentarios {
    background-color: #ABBCC3;
}

</style>

<div class="container">
    {{-- {!! Form::open([route('pelicula.store')]) !!} --}}
    <div class="row">
        <div class="col-sm-5">

            <img src="{{$pelicula->imagen_url}}" alt="" width="392" height="580">
        </div>
        <div class="col-sm-6">
            <div class="card">
                <h1>{{ $pelicula->nombre_pelicula}}</h1>
                <p>{{$pelicula->informacion_basica}}</p>
                <p class="my-4">
                    {{$pelicula->sinopsis}}
                </p>
                <div class="row">
                    <div class="col-sm-5">
                        <h3 class="rating-num"> {{$pelicula->puntaje}} <i style='font-size:24px' class="fas fa-star"></i></h3>
                    </div>
                    <div class="col-sm-5">
                        <i style='font-size:24px' class='fas fa-child'></i> {{$pelicula->cantidad_votos}} total
                    </div>
                </div>
            </div>
            <div class="card my-4">
                <iframe width="500" height="280" src="{{$pelicula->url_trailer}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h3>Comentarios: {{count($comentarios)}}</h3>
            <div class="comentarios">
                @isset($comentarios)
                @foreach ($comentarios as $comentario)
                    <h4>{{$comentario->puntaje}}</h4>
                    <p>{{$comentario->comentario}}</p>
                    <p>{{$comentario->nombre_user}}</p>
                    <p> {{$comentario->created_at}} </p>
                @endforeach
            @endisset
            </div>
        </div>


    </div>
    <div class="row">
        {!! Form::open(['route' => ['comentario.store', $pelicula->id]]) !!}
        <h3>Opinar</h3>
        <input type="number" name="pelicula_id" value="{{$pelicula->id}}" hidden>
        <input type="number" name="user_id" value="{{Auth::id()}}" hidden>
        <input type="text" name="nombre_user" value="{{Auth::user()->name}}" hidden>
        <div class="rating-box">
            <div class="ratings">
                <span class="fa fa-star-o"></span>
                <span class="fa fa-star-o"></span>
                <span class="fa fa-star-o"></span>
                <span class="fa fa-star-o"></span>
                <span class="fa fa-star-o"></span>
            </div>
        </div>
        <input name="puntaje" type="number" id="rating-value" hidden>
        {!! Form::textarea("comentario", null, ['rows' => '5', 'class' => 'form-control', 'placeholder' => '¿Que te parecio la pelicula?']) !!}
        <button type="submit" class="btn btn-warning">Enviar comentario</button>
        {!! Form::close() !!}
    </div>

    {{-- {!! Form::close() !!} --}}
</div>
@endsection
