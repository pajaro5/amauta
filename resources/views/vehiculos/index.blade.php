@extends('layouts.master')

@section('content')
    <h1>Flota disponible</h1>
    <h4 class="card-title">Exportación de datos</h4>
    <h6 class="card-subtitle">Los datos pueden ser exportados: Portapapeles, CSV, Excel, PDF & Imprimir</h6>
    <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Placa</th>
                    <th>Capacidad</th>                
                    <th>Creado en</th> 
                    <th>Editar</th>
                    <th>Borrar</th>               
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Placa</th>
                    <th>Capacidad</th>                
                    <th>Creado en</th> 
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($vehiculos as $vehiculo)
                    <tr>
                        <td><a href="/vehiculos/{{ $vehiculo->id }}">{{ $vehiculo->id }}</a></td>
                        <td><a href="/vehiculos/{{ $vehiculo->id }}">{{ $vehiculo->placa }}</a></td>
                        <td><a href="/vehiculos/{{ $vehiculo->id }}">{{ $vehiculo->capacidad }}</a></td>
                        <td><a href="/vehiculos/{{ $vehiculo->id }}">{{ $vehiculo->created_at }}</a></td>                     
                        <td><a href="{{ action('VehiculosController@edit', $vehiculo['id']) }}" class="btn btn-warning">Editar</a></td>
                        <td>
                            <form action="{{ action('VehiculosController@destroy', $vehiculo['id']) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" type="submit">Borrar</button>
                            </form>
                        </td>
                    </tr>               
                @endforeach            
            </tbody>
        </table>
    </div>        

@endsection

@section('customJS')
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