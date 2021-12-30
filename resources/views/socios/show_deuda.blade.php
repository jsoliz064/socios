@extends('adminlte::page')

@section('title', 'Socios - Deudas')

@section('content_header')
    
@stop

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link" href="{{route('socios.edit',$socio)}}">Detalles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Deudas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('socios.pago',$socio)}}">Pagos</a>
          </li>
        </ul>
      </div>

    <div class="card-body">
      <div class="row align-items-center my-4">
        <div class="col">
        </div>
        <div class="col">
          <h4 class="font-weight-bold px-2" align="center">DEUDAS REGISTRADAS</h4>
        </div>
        <div align="right" class="col">
            <a href="" class="btn btn-primary">Registrar deuda</a>
        </div>
      </div>
        <hr class="mb-1">
        <table class="table table-striped" id="clientes" >
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Monto</th>
                <th scope="col">Fecha de registro</th>
                <th scope="col">Estado</th>

                <th scope="col" width="20%">Acciones</th>
              </tr>
            </thead>
            
            <tbody>
    
              @foreach ($deudas as $deuda)
                <tr>
                  <td>{{$deuda->id}}</td>
                  <td>{{$deuda->descripcion}}</td>
                  <td>{{$deuda->monto}}</td>
                  <td>{{$deuda->created_at}}</td>
                  <td>{{$deuda->estado}}</td>

                  <td >
                    <form  action="{{route('deudas.destroy',$deuda)}}" method="post">
                      @csrf
                      @method('delete')
                       
                        <a class="btn btn-info btn-sm" href="{{route('deudas.edit',$deuda)}}">Ver o Editar</a> 
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                        value="Borrar">Eliminar</button>
                    </form>
                  </td>    
                </tr>
              @endforeach
            </tbody> 
    
          </table>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
