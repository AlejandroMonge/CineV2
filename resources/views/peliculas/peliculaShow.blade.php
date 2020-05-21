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

}
.fa-pen-square{
    color: rgb(28, 143, 189);
}
.fa-minus-circle{
    color: red;
}
.fa-trash{
    color: red;
}
.eliminar{
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
}

.comentario {
  border: 5px outset #4e130f;
  text-align: left;
  height: auto;
  width: 100%;
  border-radius: 15px;
}

</style>

<div class="container">
    @if(session()->has('bien'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="font-size:20px">×</span>
            </button>
            {{ session()->get('bien') }}
        </div>
    @elseif(session()->has('mal'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:20px">×</span>
        </button>
        {{ session()->get('mal') }}
    </div>
    @endif
    <div class="row">
        @if ($admin)
        <form action="{{route('pelicula.destroy', $pelicula->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="eliminar"><i class="fas fa-minus-circle fa-2x"></i></button>
        </form>
        <a href="{{route('pelicula.edit', $pelicula->id)}}"><i class="fas fa-pen-square fa-2x"></i></a>
    @else
    @endif
    </div>

    <div class="row">
        <div class="col-sm-5">
            <img src="{{$pelicula->imagen_url}}" alt="" width="392" height="580">
        </div>
        <div class="col-sm-6">
            <div class="card">
                <h1>{{ $pelicula->nombre_pelicula}}</h1>
                <p>{{$pelicula->anio . ' - ' . $pelicula->genero . ' - ' . $pelicula->duracion}}</p>
                <p class="my-4">
                    {{$pelicula->sinopsis}}
                </p>
                <div class="row">
                    <div class="col-sm-5">
                        <h3 class="rating-num"> {{round($pelicula->puntaje, 1)}} <i style='font-size:24px' class="fas fa-star"></i></h3>
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
                @if ($comentario->user_id == Auth::id())
                    <form action="{{route('comentario.destroy', $comentario->id)}}" method="POST">
                            @csrf
                        @method('DELETE')
                        <button type="submit" class="eliminar"><i class="fas fa-trash"></i></button>
                    </form>
                @endif
                <div class="comentario">
                    <span class="review-stars" style="color: #FF9800;">
                        <!-- ////////////// STAR RATE CHECKER ////////////// -->
                            @if($comentario->puntaje == 0)
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            @elseif($comentario->puntaje === 1)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            @elseif($comentario->puntaje === 2)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            @elseif($comentario->puntaje === 3)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            @elseif($comentario->puntaje === 4)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            @elseif($comentario->puntaje >= 5)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            @endif
                            <!-- ///////////////////////////////////////////// -->
                        </span>
                        <h4>{{$comentario->nombre_user}}</h4>
                        <p>{{$comentario->comentario}}</p>
                        <p> {{$comentario->created_at}} </p>
                </div>
                <hr size="2px" color="gray" />
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
