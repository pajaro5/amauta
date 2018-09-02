@extends('layouts.master')
@section('content')

    <div class="col-md-6 mb-3">
        <label for="nombre">Escuela</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="{{ $escuela->nombre }}" readonly>            
    </div>

    <div class="col-md-8 mb-3" id="mapa" style="height:400px;">
    
@endsection

@section('customJS')
    <script src="{{ asset('js/geo.js') }}"></script>
    <script>
        var message = "<strong> {{ $escuela->nombre }}</strong>";
            message += " está en coordenadas: <br> Lat: {{ $escuela->lat }} " ;
            message += " <br>Lng: {{ $escuela->lng }} "; 
        var escuelaMarker = new L.marker([{{ $escuela->lat }},{{ $escuela->lng }}])
            .addTo(map)    
            .bindPopup(message)
            .openPopup();                                
    </script>
@endsection