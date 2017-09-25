@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">eMail Enviado</div>
            <div class="panel-body" align="center">

                <p>Se ha enviado un eMail a <big><b><u>{{ \Auth::user()->email }}</u></b></big> con la información de los clientes.</p>
                <p>Revise su bandeja de entrada para visualizar y descargar la información.</p>  
                <br>  			
			<h4><a class="btn btn-default" href="{{route('clientes.index')}}">Volver</a></h4>
            </div>
        </div>
    </div>
</div>
@endsection