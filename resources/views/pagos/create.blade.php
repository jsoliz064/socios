@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')

@stop

@section('content')
<br>
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('pagos.store')}}" novalidate >
            @csrf
            <div align="center">
                <h4><b>Registrar Pago:</b></h4>
                <div class="row my-4">
                    <div class="col"></div>
                    <div class="col">
                        <select name = "id_socio" id="id_socio" class="mi-selector form-control" >
                            <option value="">Seleccione un Socio</option>
                            @foreach ($socios as $socio)
                                <option value="{{$socio->id}}">
                                    {{$socio->nombre}}
                                </option>
                            @endforeach    
                        </select>
                        @error('id_socio')
                            <p>DEBE SELECCIONAR UN SOCIO</p>
                        @enderror
                    </div>
                    <div class="col"></div>  
                </div>
                
                <button  class="btn btn-success btn-sm" type="submit">Siguiente</button>
                <a href="{{route('pagos.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
            </div>
        </form>
    </div>
</div>
@stop


@section('css')

    <link rel="stylesheet" href="{{asset('css/select.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('css/cruds.css')}}">

@stop

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{asset('js/mi-script.js')}}"></script>

@stop
