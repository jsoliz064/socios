@extends('adminlte::page')

@section('title', 'Deudas')

@section('content_header')
  <h1>HISTORIAL DE DEUDAS</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header"> 
          <a class="btn btn-primary btb-sm" href="{{route('deudas.create')}}">Registrar Deuda</a>    
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <table class="table table-striped" id="clientes" >
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Socio</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Monto</th>
            <th scope="col">Estado</th>
            <th scope="col">Fecha de registro</th>
            <th scope="col" width="20%">Acciones</th>
          </tr>
        </thead>
        
        <tbody>

          @foreach ($deudas as $deuda)
            <tr>
              <td>{{$deuda->id}}</td>
              <td>{{DB::table('socios')->where('id',$deuda->id_socio)->value('nombre')}}</td>
              <td>{{$deuda->descripcion}}</td>
              <td>{{$deuda->monto}}</td>
              <td>{{$deuda->estado}}</td>
              <td>{{$deuda->created_at}}</td>
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
