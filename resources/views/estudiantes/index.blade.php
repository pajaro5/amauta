@extends('layouts.master')
@section('content')
    <h1>Estudiantes registrados</h1>
    <h4 class="card-title">Exportación de datos</h4>
<h6 class="card-subtitle">Los datos pueden ser exportados: Portapapeles, CSV, Excel, PDF & Imprimir</h6>
<div class="table-responsive m-t-40">
    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Creado en</th> 
                <th>Editar</th>
                <th>Borrar</th>               
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Creado en</th>
                <th>Editar</th>
                <th>Borrar</th> 
            </tr>
        </tfoot>
        <tbody>
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td><a href="/estudiantes/{{ $estudiante->id }}">{{ $estudiante->nombre }}</a></td>
                    <td><a href="/estudiantes/{{ $estudiante->id }}">{{ $estudiante->apellido }}</a></td>
                    <td><a href="/estudiantes/{{ $estudiante->id }}">{{ $estudiante->lat }}</a></td>
                    <td><a href="/estudiantes/{{ $estudiante->id }}">{{ $estudiante->lng }}</a></td>
                    <td><a href="/estudiantes/{{ $estudiante->id }}">{{ $estudiante->created_at->toFormattedDateString() }}</a></td> 
                    <td><a href="{{ action('EstudiantesController@edit', $estudiante['id']) }}" class="btn btn-warning">Editar</a></td>
                    <td>
                        <form action="{{ action('EstudiantesController@destroy', $estudiante['id']) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>               
            @endforeach            
        </tbody>
    </table>
        

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