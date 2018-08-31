@extends('layouts.master')
@section('content')

    <form action="{{url('vehiculos')}}" method="POST">
        {{ csrf_field() }}
        <div class="col-md-6 mb-3">
            <label for="placa">Placa</label>
            <input type="text" class="form-control" name="placa" id="placa" placeholder="" value="" required>            
        </div>
        <div class="col-md-6 mb-3">
            <label for="capacidad">Capacidad</label>
            <input type="text" class="form-control" name="capacidad" id="capacidad" placeholder="" value="" required>            
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-info">Guardar Vehículo</button>
        </div>
    
        @include('layouts.errors')
        
    </form>

@endsection