@extends('adminlte::page')

@section('title', 'Socios')

@section('content_header')
    
@stop

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">Detalles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('socios.deuda',$socio)}}">Deudas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('socios.pago',$socio)}}">Pagos</a>
          </li>
        </ul>
      </div>

    <div class="card-body">
        <div align="center" class="my-4">
            <h4 class="font-weight-bold px-2">DATOS COMPLETOS</h4>
        </div>
        <form method="post" action="{{route('socios.update',$socio)}}" novalidate >

            @csrf
            @method('PATCH')
            <h5>Codigo:</h5>
            <input type="text"  name="codigo" value="{{$socio->codigo}}" class="focus border-primary  form-control">
            @error('codigo')
                <p>DEBE INGRESAR BIEN EL DATO</p>
            @enderror

            <h5>Carnet de Identidad:</h5>
            <input type="text"  name="ci"  value="{{$socio->ci}}"class="focus border-primary  form-control">
            @error('ci')
                <p>DEBE INGRESAR BIEN EL DATO</p>
            @enderror

            <h5>Nombre Completo:</h5>
            <input type="text"  name="nombre" value="{{$socio->nombre}}" class="focus border-primary  form-control" >
            @error('nombre')
            <p>DEBE INGRESAR BIEN SU NOMBRE</p>
            @enderror


            <h5>Telefono:</h5>
            <input type="text" name="telefono" value="{{$socio->telefono}}" class="focus border-primary  form-control" >


            @error('telefono')
                <p>DEBE INGRESAR BIEN SU TELEFONO</p>
            @enderror

            <h5>Direccion:</h5>
            <input type="text" name="direccion" value="{{$socio->direccion}}" class="focus border-primary  form-control" >


            @error('direccion')
                <p>DEBE INGRESAR BIEN EL DATO</p>
            @enderror

           
            <h5>Estado Civil:</h5>
            <select name="estado_civil" class="focus border-primary  form-control">
                <option value="{{$socio->estado_civil}}">{{$socio->estado_civil}}</option>
                <option value="SOLTERO">SOLTERO</option>
                <option value="SOLTERA">SOLTERA</option>

                <option value="CASADO">CASADO</option>
                <option value="CASADA">CASADA</option>

                <option value="DIVORSIADO">DIVORSIADO</option>
                <option value="DIVORSIADA">DIVORSIADA</option>

                <option value="VIUDO">VIUDO</option>
                <option value="VIUDA">VIUDA</option>


            </select>

            @error('estado_civil')
                <p>DEBE INGRESAR BIEN EL DATO</p>
            @enderror

            <h5>Nacionalidad:</h5>
            <input type="text" name="nacionalidad" value="{{$socio->nacionalidad}}" class="focus border-primary  form-control" >


            @error('nacionalidad')
                <p>DEBE INGRESAR BIEN EL DATO</p>
            @enderror
            
            
            <br>
            <br>
            
            <button  class="btn btn-danger btn-sm" type="submit">Actualiar</button>

            <a href="{{route('socios.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
