@extends('layouts.tema')

<style>
    .acciones a{
        color:  #858796;
    }
    .fa-heart{
        color: red;
    }
    .fa-heart:hover{
        color:  #858796;
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
</style>

@section('content')
<div class="container">
    @if(session()->has('Mensaje'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="font-size:20px">×</span>
            </button>
            {{ session()->get('Mensaje') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="addDiv pb-2">
            </div>

            <div class="card">
                <table class="table table-striped">
                    <tr>
                        <th>Poster</th>
                        <th>Nombre</th>
                        <th>Puntuacion</th>
                    </tr>
                    @foreach ($favoritas as $pelicula)
                        <tr>
                            <td> <a href="{{ route('pelicula.show', $pelicula->id)}}"> <img src="{{$pelicula->imagen_url}}" alt="" width="98" height="140"> </a> </td>
                            <td>
                                 <a href="{{ route('pelicula.show', $pelicula->id)}}"> {{ $pelicula->nombre_pelicula }}</a>
                                 <br>
                                 <div class="acciones">
                                    {!! Form::open(['route' => ['favorita.destroy',$pelicula->id], 'id' => 'favorita']) !!}
                                        @csrf
                                        @method('DELETE')
                                        <input type="number" name="pelicula_id" value="{{$pelicula->id}}" hidden>
                                    {!! Form::close() !!}
                                    <a href="#" onclick="document.getElementById('favorita').submit();"><i class="fas fa-heart fa-3x pt-4"></i></a>
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
