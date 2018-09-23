@extends('layouts.master')
@section('content')

    <div class="col-md-8 mb-3" id="mapa" style="height:400px;">
        

@endsection

@section('customJS')
    <script src="{{ asset('js/geo.js') }}"></script>
    <script>
        //console.log('datos:' + {{ $resultadoTSP }});
            
    </script>
@endsection