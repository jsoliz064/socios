@extends('adminlte::page')

@section('title', 'Socios - Pagos')

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
            <a class="nav-link" href="{{route('socios.deuda',$socio)}}">Deudas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Pagos</a>
          </li>
        </ul>
      </div>
      
    <div class="card-body">
      
      <div class="row align-items-center my-4">
        <div class="col">
        </div>
        <div class="col">
          <h4 class="font-weight-bold px-2" align="center">PAGOS REGISTRADOS</h4>
        </div>
        <div align="right" class="col">
            <a href="{{route('socios.pago.store',$socio)}}" class="btn btn-primary">Registrar pago</a>
        </div>
      </div>
      <hr class="my-1">
        <table class="table table-striped" id="clientes" >
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Deudas pagadas</th>
              <th scope="col">Total</th>
              <th scope="col">Fecha de registro</th>
              <th scope="col" width="20%">Acciones</th>
            </tr>
          </thead>
          
          <tbody>
  
            @foreach ($pagos as $pago)
              <tr>
                <td>{{$pago->id}}</td>
                <td>{{$pago->deudas_pagadas}}</td>
                <td>{{$pago->total}}</td>
                <td>{{$pago->created_at}}</td>
                <td >
                  <form  action="{{route('socios.pago.destroy',$pago)}}" method="post">
                    @csrf
                    @method('delete')
                     
                      <a class="btn btn-info btn-sm" href="{{route('pagos.show',$pago)}}">Ver</a> 
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">

@stop

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
     $('#clientes').DataTable();
    } );
</script>

@stop

