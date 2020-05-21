@extends('layouts.tema')

<style>
    .acciones a{
        color:  #858796;
    }
    .fa-heart:hover{
        color: red;
    }
    .fa-clock:hover{
        color: rgb(60, 212, 0);
    }
    .addDiv{
        position: relative;
        right: 50%;
        left: 50%;
    }
    #agregar:hover{
        color: #063e34 ;
    }
    #agregar{
        color:  #858796;
    }
    #llenarFav{
        color: red;
    }
    #llenarNext{
        color: rgb(60, 212, 0);
    }
    #llenarComment{
        color:rgb(0, 170, 248);
    }
</style>

@section('content')
<div class="container">
    @if(session()->has('Mensaje'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="font-size:20px">×</span>
            </button>
            {{ session()->get('Mensaje') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="addDiv pb-2">
                @if ($admin)
                    <a href="{{route('pelicula.create')}}"><i id="agregar" class="fas fa-plus-circle fa-3x"></i></a>
                @else

                @endif
            </div>

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
                            <td>
                                 <a href="{{ route('pelicula.show', $pelicula->id)}}"> {{ $pelicula->nombre_pelicula }}</a>
                                 <br>
                                 <div class="acciones">
                                    @if (App\Favorita::where(['user_id' => Auth::id(), 'pelicula_id' => $pelicula->id])->first() == null)
                                            {!! Form::open(['route' => 'favorita.store', 'id' => 'fav'.$pelicula->id, 'hidden']) !!}
                                                <input type="number" name="pelicula_id" value="{{$pelicula->id}}" hidden>
                                            {!! Form::close() !!}
                                            <a href="#" onclick="document.getElementById('{{'fav'.$pelicula->id}}').submit();"><i class="fas fa-heart fa-3x pt-4 pr-0"></i></a>
                                    @else
                                        <i id="llenarFav" class="fas fa-heart fa-3x pt-4  pr-0"></i>
                                    @endif
                                    @if (App\Proxima::where(['user_id' => Auth::id(), 'pelicula_id' => $pelicula->id])->first() == null)
                                            {!! Form::open(['route' => 'proxima.store', 'id' => 'next'.$pelicula->id, 'hidden']) !!}
                                                <input type="number" name="pelicula_id" value="{{$pelicula->id}}" hidden>
                                            {!! Form::close() !!}
                                            <a href="#" onclick="document.getElementById('{{'next'.$pelicula->id}}').submit();"><i class="fas fa-clock fa-3x pl-0"></i></a>
                                    @else
                                        <i id="llenarNext" class="fas fa-clock fa-3x pl-0"></i>
                                    @endif
                                    @if (App\Comentario::where(['user_id' => Auth::id(), 'pelicula_id' => $pelicula->id])->first() == null)

                                    @else
                                        <i id="llenarComment" class="fas fa-comment-alt fa-3x pl-0"></i>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <h1 class="rating-num"> {{round($pelicula->puntaje, 1)}} <i style='font-size:24px' class="fas fa-star"></i></h1>
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
