@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
  <h1>HISTORIAL DE PAGOS</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header"> 
          <a class="btn btn-primary btb-sm" href="{{route('pagos.create')}}">Registrar Pago</a>    
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <table class="table table-striped" id="clientes" >
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Socio</th>
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
              <td>{{DB::table('socios')->where('id',$pago->id_socio)->value('nombre')}}</td>
              <td>{{$pago->deudas_pagadas}}</td>
              <td>{{$pago->total}}</td>
              <td>{{$pago->created_at}}</td>
              <td >
                <form  action="{{route('pagos.destroy',$pago)}}" method="post">
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
