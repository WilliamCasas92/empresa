@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
			<form class="form-horizontal" action="/clientes/{{$cliente->id}}" method="POST">
			    <input type="hidden" name="_method" value="PUT">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			    <div class="form-group">
                    <label class="control-label col-md-4" for="InputNombres">Nombres:</label>
                    <div class="col-md-4">
                        <input type="text" name="nombres" class="form-control" placeholder="Nombres" value="{{ $cliente->nombres}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="InputPerfil">Apellidos:</label>
                    <div class="col-md-4">
                        <input type="text" name="apellidos" class="form-control" placeholder="Perfil" value="{{ $cliente->apellidos}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="InputPerfil">Perfil:</label>
                    <div class="col-md-4">
                        <input type="text" name="tipo_contacto" class="form-control" placeholder="Perfil" value="{{ $cliente->tipo_contacto}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="InputIdentificacion">Identificación:</label>
                    <div class="col-md-4">
                        <input type="text" name="identificacion" class="form-control" placeholder="Identifiación" value="{{ $cliente->identificacion}}" required>
                    </div>
                </div>
                <form class="form-inline">
                    <div align="center">
                    	<input class="btn btn-default" type="submit" value="Actualizar">
                    </div>
                </form>
			</form>
			<h4><a class="btn btn-default" href="{{route('clientes.index')}}">Ir atrás</a></h4>
            </div>
        </div>
    </div>
</div>
@endsection               