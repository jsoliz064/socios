@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

@stop

@section('content')
<br>
<div align="center">
    <div class="card contenido">
        <h4 class="subtitle my-4">Buscar Socio:</h4>
            <form method="post" action="{{route('socios.buscar')}}" novalidate >
                @csrf
                <div class="row justify-content-center align-items-center">
                    <div class="col"></div>
                    <div class="col-auto">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-8" >
                                <input type="text" name="codigo" placeholder="Codigo de cliente" class="focus border-primary  form-control" >
                                @error('codigo')
                                    <div class="text-danger">
                                        Debe ingresar el dato.
                                    </div>
                                @enderror
                            </div>
                            <div class="col-4" align="center" >
                                <button  class="btn btn-primary btn-sm" type="submit">Buscar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                    
                </div>
            </form>
        <hr>
        <div class="prueba">
            <h2 class="title"> ACCESOS RAPIDOS</h2>
            <h4 class="subtitle">Registrar</h4>
        </div>
    
        <div class="row justify-content-center align-items-center mb-5">
            <div class="col-auto px-4 text-center" >
                    <a href="{{route('socios.create')}}">
                        <i class="fas fa-id-card fa-7x" style="color:#364542" ></i> 
                    </a>
                    <h4 class="subtitle">Socio</h4>
            </div>
            <div class="col-auto px-4 text-center" >
                    <a href="{{route('pagos.create')}}">
                        <i class="fas fa-money-bill-wave-alt fa-7x" style="color:#364542" ></i> 
                    </a>
                    <h4 class="subtitle">Pago</h4>
            </div>
            

        </div>
        
</div>
</div>
</div>

    

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
@stop

@section('js')

@stop