@extends('layouts.master')
@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-12 mb-3" id="mapa" style="height:550px;">
        </div>
        <div class="row">
            <div class="col-md-12 mb-3" id="tablaRutas">
                <h1>Rutas calculadas</h1>
                <h4 class="card-title">Exportación de datos</h4>
                <h6 class="card-subtitle">Los datos pueden ser exportados: Portapapeles, CSV, Excel, PDF & Imprimir</h6>
                
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Ruta</th>
                                <th>Vehículo</th>
                                <th>Secuencia</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Ruta</th>
                                <th>Vehículo</th>
                                <th>Secuencia</th>
                                <th>Nombre</th>
                                <th>Apellido</th>                                
                            </tr>
                        </tfoot>
                        <tbody id="cuerpoTabla">
                            <tr>
                                <td>1</td>
                                <td>PQW0833</td>
                                <td>1</td>
                                <td>Beorn</td> 
                                <td>Fuerte</td>                                
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>PQW0833</td>
                                <td>2</td>
                                <td>Spider</td> 
                                <td>Man</td>                                
                            </tr>    
                            <tr>
                                <td>1</td>
                                <td>PQW0833</td>
                                <td>3</td>
                                <td>Paulo</td> 
                                <td>Cohello</td>                                
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>PQW0833</td>
                                <td>4</td>
                                <td>Sandra</td> 
                                <td>Parranda</td>                                
                            </tr>  
                            <tr>
                                <td>2</td>
                                <td>XYZ9876</td>
                                <td>1</td>
                                <td>Bat</td> 
                                <td>Man</td>                                
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>XYZ9876</td>
                                <td>2</td>
                                <td>Toyota</td> 
                                <td>Prius</td>                                
                            </tr>       
                            <tr>
                                <td>2</td>
                                <td>XYZ9876</td>
                                <td>3</td>
                                <td>Iron</td> 
                                <td>Man</td>                                
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>XYZ9876</td>
                                <td>4</td>
                                <td>Fecho</td> 
                                <td>Ortiz</td>                                
                            </tr>  
                            <tr>
                                <td>3</td>
                                <td>GYE-123</td>
                                <td>1</td>
                                <td>Bilbo</td> 
                                <td>Bolsón</td>                                
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>GYE-123</td>
                                <td>2</td>
                                <td>Toro</td> 
                                <td>Rosso</td>                                
                            </tr>       
                            <tr>
                                <td>3</td>
                                <td>GYE-123</td>
                                <td>3</td>
                                <td>Fenix</td> 
                                <td>Lopez</td>                                
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>GYE-123</td>
                                <td>4</td>
                                <td>Luis</td> 
                                <td>Miguel</td>                                
                            </tr>                                                                                        
                        </tbody>
                    </table>
                
                </div>   
            </div>    



     
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

        //Calculo la capacidad de la flota disponible
        //var capacidadFlota = Object.keys(flota).reduce(function (previous, key) { return previous + flota[key].capacidad; }, 0);        
        
        //var vehiculosRequeridos = Math.ceil(estudiantes.length/capacidadFlota);  //redondeo arriba


        var rutasCalculadas = [];
        var aux = 0;
        for (let i = 0; i < flota.length; i++) {
            if(aux < estudiantes.length){                       
                var r = new Ruta(i+1,flota[i]);            
                var capacidadUsada = 1;
                while ( (capacidadUsada <= flota[i].capacidad) && (aux < estudiantes.length) ) {
                    r.estudiantes.push(estudiantes[aux]);
                    capacidadUsada++;
                    aux++;    
                }
                rutasCalculadas.push(r);                                        
            }
        }


        //Dibujar rutas calculadas en mapa
        var rutasInd = [];
        rutasCalculadas.forEach(function(ruta){
            console.log('rutaId: ' + ruta['id']);
            var secuenciaRuta = [];

            secuenciaRuta.push(L.latLng(escuela.lat,escuela.lng));  //Escuela

            ruta["estudiantes"].forEach(function(estudiante){
                secuenciaRuta.push(L.latLng(estudiante.lat,estudiante.lng));
            });

            secuenciaRuta.push(L.latLng(escuela.lat,escuela.lng));  //Escuela
            rutasInd.push(secuenciaRuta)            
        });
        
        var rutasIndividuales = L.polyline(rutasInd, {color: 'red'}).addTo(map);
        //polylineDecorator
        L.polylineDecorator(rutasInd, {
            patterns: [
                {offset: 25, repeat: 50, symbol: L.Symbol.arrowHead({pixelSize: 15, pathOptions: {fillOpacity: 1, weight: 0}})}
            ]
        }).addTo(map);

        map.fitBounds(rutasIndividuales.getBounds());


        //Dibura rutas calculadas en tabla
                
        /*
        var rutasInd = [];
        var tablaCuerpo = document.getElementById('cuerpoTabla');
        rutasCalculadas.forEach(function(ruta){                                    
            ruta["estudiantes"].forEach(function(estudiante){
                //crear fila
                var fila = document.createElement("tr");
                    var col1 = document.createElement("td"); 
                        col1.innerHTML = ruta['id'];
                        col1.appendChild(fila); 
                        fila.appendChild(col1);
                    
                    var col2 = document.createElement("td"); 
                        col2.innerHTML = ruta['vehiculo'].placa;
                        col2.appendChild(fila);
                        fila.appendChild(col2); 
                //secuenciaRuta.push(L.latLng(estudiante.lat,estudiante.lng));
                tablaCuerpo.appendChild(fila);

            });

                      
        });
        
        */    

    </script>
    <script src="{{ asset('js/lib/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/datatables-init.js') }}"></script> 
@endsection