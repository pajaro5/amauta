@extends('layouts.master')
@section('content')
    <form action="{{url('estudiantes')}}" method="POST">
        {{ csrf_field() }}
        <div class="col-md-6 mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="" required>            
        </div>
        <div class="col-md-6 mb-3">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="" value="" required>            
        </div>
        <input type="hidden" id="lat" name="lat" value="" required>
        <input type="hidden" id="lng" name="lng" value="" required>
        <div class="col-md-8 mb-3" id="mapa" style="height:400px;">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">Guardar Estudiante</button>
        </div>
    
        @include('layouts.errors')
        

    </form>

        

@endsection

@section('customJS')
    <script src="{{ asset('js/geo.js') }}"></script>
    <script>
        var estudianteMarker = new L.marker(escuelaLocation,{
            draggable:'true'
            })
            .bindPopup("")
            .addTo(map);

        estudianteMarker.on('dragend',function(){
            var position = estudianteMarker.getLatLng();
            $("#lat").val(position.lat);
            $("#lng").val(position.lng);
            var message = "Estudiante <strong>" + $("#nombre").val() + " " + $("#apellido").val() + "</strong>";
            message += " actualizado en coordenadas: <br> Lat: " + position.lat;
            message += " <br>Lng: " + position.lng; 
            estudianteMarker.bindPopup(message).openPopup();
        });
            
    </script>
@endsection