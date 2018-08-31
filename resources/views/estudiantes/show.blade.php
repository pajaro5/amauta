@extends('layouts.master')
@section('content')

    <div class="col-md-6 mb-3">
        <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="{{ $estudiante->nombre }}" readonly>            
    </div>
    <div class="col-md-6 mb-3">
        <label for="apellido">Apellido</label>
    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="" value="{{ $estudiante->apellido }}" readonly>            
    </div>    
    <div class="col-md-8 mb-3" id="mapa" style="height:400px;">
    </div>
    <div class="form-group">
        <a href="{{ url('/estudiantes') }}" class="btn btn-primary" role="button">Volver al listado de estudiantes</a>
    <a href="{{ action('EstudiantesController@edit', $estudiante['id']) }}" class="btn btn-warning" >Editar datos de {{ $estudiante->nombre }} {{ $estudiante->apellido }}</a>
    </div>

@endsection

@section('customJS')
    <script src="{{ asset('js/geo.js') }}"></script>
    <script>
        var message = "Estudiante <strong> {{ $estudiante->nombre }} {{ $estudiante->apellido }}</strong>";
            message += " está en coordenadas: <br> Lat: {{ $estudiante->lat }} " ;
            message += " <br>Lng: {{ $estudiante->lng }} "; 
        var estudianteMarker = new L.marker([{{ $estudiante->lat }},{{ $estudiante->lng }}])
            .addTo(map)    
            .bindPopup(message)
            .openPopup();
                                
    </script>
@endsection