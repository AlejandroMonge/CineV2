@extends('layouts.tema')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                @isset($pelicula)
                    {!! Form::model($pelicula, ['route' => ['pelicula.update', $pelicula->id], 'method' => 'PATCH']) !!}
                    @method('PATCH')
                @else
                    {!! Form::open(['route' => 'pelicula.store']) !!}
                @endisset
                    <div class="card-header">Cargar nueva pelicula</div>
                    <div class="card-body">
                        <div class="from-grup">
                            {!! Form::label('nombre_pelicula', '¿Cual es el nombre de la pelicula?') !!}
                            <br>
                            {!! Form::text('nombre_pelicula', isset($pelicula)?$pelicula->nombre_pelicula:null, ['placeholder' => 'Titanic', 'size' => '55']) !!}
                        </div>
                        <div class="from-grup">
                            {!! Form::label('sinopsis', '¿De que trata?') !!}
                            {!! Form::textarea('sinopsis', null, ['placeholder' => 'Entonces...', 'rows' => '3', 'cols' => '55']) !!}
                        </div>
                        <div class="from-grup">
                            {!! Form::label('imagen_url', 'Dame el URL del poster y del video') !!}
                            {!! Form::textarea('imagen_url', null, ['placeholder' => 'Al abrir el url debe solo aparecer la imagen', 'rows' => '2', 'cols' => '55']) !!}
                            {!! Form::textarea('url_trailer', null, ['placeholder' => 'El video debe ser de toda la pantalla (embed)','rows' => '2', 'cols' => '55']) !!}
                        </div>
                        <div class="from-grup">
                            {!! Form::label('anio', 'Año de la pelicula') !!}
                            <select name="anio" class="form-control" id="dropdownYear" style="width: 120px;" onchange="getProjectReportFunc()">
                            </select>
                        </div>
                        <div class="from-grup">
                            {!! Form::label('genero', '¿Que genero es la pelicula?') !!}
                            {!! Form::text('genero', null, ['placeholder' => 'Accion o Comedia o Accion/Comedia ...', 'rows' => '1',     'size' => '55']) !!}
                        </div>
                        <div class="from-grup">
                            {!! Form::label('duracion', '¿Cuanto dura la pelicula?') !!}
                            {!! Form::text('duracion', null, ['placeholder' => '2h 20m o más    ', 'size' => '55']) !!}
                        </div>
                        {!! Form::submit('Enviar', ['class' => 'btn btn-outline-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/yearDropDown.js') }}"></script>
@endsection
