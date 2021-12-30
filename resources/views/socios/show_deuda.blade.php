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

      <form method="post" action="{{route('socios.deuda.store',$socio)}}" novalidate >
        @csrf
        <div class="row align-items-center my-4">
          <div class="col-6">
            <input type="text" name="descripcion" placeholder="Descripción" class="focus border-primary  form-control" >
            @error('descripcion')
              <div class="text-danger">
                Debe ingresar el dato.
              </div>
            @enderror
          </div>
          <div class="col-4">
            <input type="number" name="monto" placeholder="Monto" class="focus border-primary  form-control" >
            @error('monto')
              <div class="text-danger">
                Debe ingresar el dato.
              </div>
            @enderror
          </div>
          <div align="left" class="col-2">
              <button  class="btn btn-success form-control" type="submit">Registrar Deuda</button>
          </div>
        </div>
      </form>

      

      <div class="row align-items-center my-4">
        <div class="col">
          <h4 class="font-weight-bold px-2" align="center">DEUDAS REGISTRADAS</h4>
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
                    <form  action="{{route('socios.deuda.destroy',$deuda)}}" method="post">
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
