@extends('layouts.master')
@section('content')
<form id="vehiculoForm" action="{{ action('VehiculosController@update', $vehiculo['id']) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PATCH">
        <div class="col-md-6 mb-3">
            <label for="placa">Placa</label>
            <input type="text" class="form-control" name="placa" id="placa" placeholder="" value="{{ $vehiculo->placa }}" required>            
        </div>
        <div class="col-md-6 mb-3">
            <label for="capacidad">Capacidad</label>
            <input type="text" class="form-control" name="capacidad" id="capacidad" placeholder="" value="{{ $vehiculo->capacidad }}" required>            
        </div>                        
        <div class="form-group">
            <button type="submit" class="btn btn-success">Actualizar Vehículo</button>
        </div>
    
        @include('layouts.errors')        

    </form>

        

@endsection

@section('customJS')    
    <script>        
        $('#vehiculoForm').submit(function () {
            var laGranPlaca = $('#placa').val().toUpperCase();
            $('#placa').val(laGranPlaca);            
        })
            
    </script>
@endsection