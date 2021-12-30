@extends('adminlte::page')

@section('title', 'Socio-Realizar Pago')

@section('content_header')
    
@stop

@section('content')
<br>
<div class="container " style="background-color: white">
    <div class="row justify-content-center border rounded-top">
        <div class="col">
            <div class="row row justify-content-center m-2">
                <h2 class="font-weight-bold">REALIZAR PAGO</h2>
            </div>
             
            <form method="post" action="{{route('deuda_pagos.store')}}" novalidate >
                @csrf 
                <div class="row row justify-content-center"> 
                    <div class="col-4"><h5>Socio:</h5></div>        
                    <div class="col-4"><h5>Deuda:</h5></div>
                    <div class="col-2"></div>
                </div>

                <div class="row row justify-content-center"> 
                    <div class="col-4">
                        <select name="id_socio" class="form-control" onchange="habilitar()" >
                            <option value="{{$socio->id}}">{{$socio->nombre}}</option>
                        </select>
                    </div>        
                   
                    <div class="col-4">
                        <select name="id_deuda" id="id_deuda" class="form-control" onchange="habilitar()" >
                            <option value="">Seleccione una opción</option>
                                @foreach ($deudas as $deuda)
                                    <option value="{{$deuda->id}}">
                                        {{$deuda->descripcion}}
                                    </option>
                                @endforeach
                        </select>
                        @error('id_deuda')
                            <div class="text-danger">
                                Debe elijir una opción.
                            </div>
                        @enderror
                    </div>
                   
                    <div class="col-2 align-items-center">
                        <button  class="btn btn-primary btn-sm" type="submit">Añadir</button>
                    </div>
                </div>  
            </form>
            
            <div class="row row justify-content-center my-4">
                <h3>DETALLE</h3>
            </div>

            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">Descripcion</th>
                          <th scope="col">Monto</th>
                          <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($deuda_pagos as $deuda_pago)
                            <tr>
                                <td>{{DB::table('deudas')->where('id',$deuda_pago->id_deuda)->value('descripcion')}}</td>
                                <td>{{DB::table('deudas')->where('id',$deuda_pago->id_deuda)->value('monto')}}</td>
                                <td>
                                    <form action="{{route('deuda_pagos.destroy',$deuda_pago)}}" method="post">
                                      @csrf
                                      @method('delete')
                                      <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                                      value="Borrar"><i class="fas fa-times"></i> </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" class="font-weight-bold">MONTO TOTAL</td>
                            <td class="font-weight-bold">{{$pago->total}}</td>
                        </tr>
                    </tbody> 
                </table> 
            </div>
            
             <div class="row justify-content-end">
                <form action="{{route('socios.pago.destroy', $pago)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm m-2" onclick="return confirm('¿ESTA SEGURO DE BORRAR?')" 
                    value="Borrar">Cancelar Pago</button> 
                    <a class="btn btn-success btn-sm m-2" href="{{route('socios.pago',$socio)}}">Terminar</a> 
                  </form>
            </div> 
            
        </div>
    </div>       
</div>
@stop

@section('css')

@stop

@section('js')

@stop