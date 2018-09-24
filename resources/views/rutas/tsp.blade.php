@extends('layouts.master')
@section('content')

    <div class="col-md-12 mb-3" id="mapa" style="height:550px;">
     
@endsection

@section('customJS')
    <script src="{{ asset('js/geo.js') }}"></script>
    <script>      
    
        function Ruta(id,vehiculo){
            this.id = id;
            this.vehiculo = vehiculo;
            this.estudiantes = [];
        }
        var escuela = {};
        escuela.id = {{ $data['escuela']->id }};
        escuela.nombre = "{{ $data['escuela']->nombre }}"; 
        escuela.lat = {{ $data['escuela']->lat }};
        escuela.lng = {{ $data['escuela']->lng }};

        //Constructor obj Estudiante
        function Estudiante(id, nombre, apellido, lat, lng, direccion){
            this.id = id;
            this.nombre = nombre;
            this.apellido = apellido;
            this.lat = lat;
            this.lng = lng;
        };
               
        var estudiantes = [];
        @foreach ($data['estudiantesTSP'] as $estudiante)
            estudiantes.push(
                new Estudiante(
                    {{ $estudiante->id }},
                    "{{ $estudiante->nombre }}",
                    "{{ $estudiante->apellido }}",
                    {{ $estudiante->lat }},
                    {{ $estudiante->lng }}
                )
            );  
        @endforeach
        
        //Constructor bus escolar
        function Vehiculo(id,placa,capacidad){
            this.id = id;
            this.placa = placa;
            this.capacidad = capacidad;
        }

        var flota = [];
        @foreach ($data['flota'] as $vehiculo)
            flota.push(
                new Vehiculo(
                    {{ $vehiculo->id }},
                    "{{ $vehiculo->placa }}",
                    {{ $vehiculo->capacidad }}
                )
            );
        @endforeach


        //Crear marcadores
        //escuela        
        var escuelaM = new L.marker([escuela.lat, escuela.lng])
            .bindPopup("Escuela: " + escuela.nombre)
            .addTo(map);

        //estudiantes
        estudiantes.forEach(function(estudiante){
            new L.marker([estudiante.lat, estudiante.lng])
                .bindPopup("Estudiante: " + estudiante.nombre + " " + estudiante.apellido)
                .addTo(map);            
        });

        //armo ruta TSP
        
        var coordenadas = [];
        //escuela
        coordenadas.push(L.latLng(escuela.lat,escuela.lng));

        //estudiantes
        estudiantes.forEach(function(estudiante){
            coordenadas.push(L.latLng(estudiante.lat,estudiante.lng));
        });
        //escuela
        coordenadas.push(L.latLng(escuela.lat,escuela.lng));

        //polyline
        var rutaTSP = L.polyline(coordenadas, {color: 'red'}).addTo(map);

        //polylineDecorator
        L.polylineDecorator(coordenadas, {
            patterns: [
                {offset: 25, repeat: 50, symbol: L.Symbol.arrowHead({pixelSize: 15, pathOptions: {fillOpacity: 1, weight: 0}})}
            ]
        }).addTo(map);

        map.fitBounds(rutaTSP.getBounds());

    </script>
@endsection