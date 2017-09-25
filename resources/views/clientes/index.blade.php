@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Informe de Clientes</div>
            <div class="panel-body">
                <a href="{{ route('archivo_excel',['type'=>'xlsx']) }}"><button class="btn btn-success">Generar Excel</button></a>
                <a href="{{ route('vistapdf',['download'=>'pdf']) }}"><button class="btn btn-success">Generar PDF</button></a>
                <a href="{{ route('generar_email') }}"><button class="btn btn-primary">Enviar Información al eMail</button></a>
                <br><br>
                @if (session('mensaje'))
                    <div class="alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                @endif
                <div class="table-responsive">
    				<table class="table table-hover">
    					<thead>
                            <tr>
                                <th class="text-center">Nombres</th>
    							<th class="text-center">Apellidos</th>
    							<th class="text-center">Tipo de Contacto</th>
    							<th class="text-center">Identificación</th>
    							<th class="text-center">Tipo de identifiación</th>
    							<th class="text-center">Alerta</th>
    							<th class="text-center">Edad</th>
    							<th class="text-center">Fecha de Creación</th>
    							<th class="text-center">Ciudad de Nacimiento</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>                  
                        <tbody>
                        @if(count($clientes))
                            @foreach($clientes as $cliente)
                                <tr>
                                	<td class="text-center">{{ $cliente->nombres }}</td>
    								<td class="text-center">{{ $cliente->apellidos }}</td>
    								<td class="text-center">{{ $cliente->tipo_contacto }}</td>
    								<td class="text-center">{{ $cliente->identificacion }}</td>
    								<td class="text-center">{{ $cliente->tipo_identificacion }}</td>
    								<td class="text-center">{{ $cliente->alerta }}</td>
    								<td class="text-center">{{ $cliente->edad }}</td>
    								<td class="text-center">{{ $cliente->fecha_creacion }}</td>
    								<td class="text-center">{{ $cliente->ciudad_nacimiento }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-info btn-xs ">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                            </table>
                     	@else
                            </table>
                            <h3 class="text-center">No existen clientes</h3>
                        @endif
                </div>
                <h4><a class="btn btn-default" href="{{route('home')}}">Ir atrás</a></h4>
            </div>
        </div>
    </div>
</div>
@endsection