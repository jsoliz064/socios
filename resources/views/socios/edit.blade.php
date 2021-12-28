@extends('adminlte::page')

@section('title', 'Socios')

@section('content_header')
    <h1>Datos Socio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
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
            
            <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>

            <a href="{{route('socios.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
