@extends('adminlte::page')

@section('title', 'Deudas - Socios')

@section('content_header')
    <h1>Editar Deuda</h1>
@stop

@section('content')
@if(session('status'))
    <h4 class="alert alert-warning mb-2">{{session('status')}}</h4>
@endif
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('deudas.update',$deuda)}}" novalidate >

            @csrf
            @method('PATCH')

            <h5>Socio:</h5>
            <select name = "id_socio" id="id_socio" class="mi-selector form-control" >
                <option value="{{$socio_datos->id}}">{{$socio_datos->nombre}}</option>
                    @foreach ($socios as $socio)
                        <option value="{{$socio->id}}">
                            {{$socio->nombre}}
                        </option>
                    @endforeach
            </select>
           
            @error('id_socio')
                <p>DEBE SELECCIONAR UN SOCIO</p>
            @enderror

            <h5>Descripcion:</h5>
            <input type="text"  name="descripcion" value="{{$deuda->descripcion}}" class="focus border-primary  form-control">
            @error('descripcion')
                <p>DEBE INGRESAR BIEN EL DATO</p>
            @enderror

            <h5>Monto:</h5>
            <input type="number"  name="monto" value="{{$deuda->monto}}" class="focus border-primary  form-control" >
            @error('monto')
            <p>DEBE INGRESAR BIEN EL DATO</p>
            @enderror
            
            
            <br>
            <br>
            
            <button  class="btn btn-danger btn-sm" type="submit">Actualiar</button>

            <a href="{{route('deudas.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
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
