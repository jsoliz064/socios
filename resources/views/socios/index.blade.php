@extends('adminlte::page')

@section('title', 'Socios')

@section('content_header')
  <h1>LISTA DE SOCIOS</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header"> 
          <a class="btn btn-primary btb-sm" href="{{route('socios.create')}}">Registrar Socio</a>    
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <table class="table table-striped" id="clientes" >
        <thead>
          <tr>
            <th scope="col">Codigo</th>
            <th scope="col">C.I</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Fecha de registro</th>
            <th scope="col" width="20%">Acciones</th>
          </tr>
        </thead>
        
        <tbody>

          @foreach ($socios as $socio)
            <tr>
              <td>{{$socio->codigo}}</td>
              <td>{{$socio->ci}}</td>
              <td>{{$socio->nombre}}</td>
              <td>{{$socio->telefono}}</td>
              <td>{{$socio->created_at}}</td>
              <td >
                <form  action="{{route('socios.destroy',$socio)}}" method="post">
                  @csrf
                  @method('delete')
                   
                    <a class="btn btn-info btn-sm" href="{{route('socios.edit',$socio)}}">Ver o Editar</a> 
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
