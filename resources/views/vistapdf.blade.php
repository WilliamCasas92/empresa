<!DOCTYPE html>
<html>
<head>
<style>
	table {
	    width:100%;
	}
	table, th, td {
	    border: 1px solid black;
	    border-collapse: collapse;
	}
	th, td {
	    padding: 5px;
	    text-align: left;
	}
	table#t01 tr:nth-child(even) {
	    background-color: #eee;
	}
	table#t01 tr:nth-child(odd) {
	   background-color:#fff;
	}
	table#t01 th {
	    background-color: black;
	    color: white;
	}
	#centertd td
	{
	    text-align:center; 
	    vertical-align:middle;
	}
	#centerth th
	{
	    text-align:center; 
	    vertical-align:middle;
	}
</style>
</head>
<body>
<h2>Clientes Registrados en la Empresa A</h2>
	<div style="overflow-x:auto;">
		<table id="t01 centerth centertd">
			<thead>
		        <tr>
		            <th>Nombres</th>
					<th>Apellidos</th>
					<th>Tipo de Contacto</th>
					<th>Identificación</th>
					<th>Tipo de identifiación</th>
					<th>Alerta</th>
					<th>Edad</th>
					<th>Fecha de Creación</th>
					<th>Ciudad de Nacimiento</th>
		        </tr>
		    </thead>
		    <tbody>
		        @foreach($clientes as $cliente)
		            <tr>
		            	<td>{{ $cliente->nombres }}</td>
						<td>{{ $cliente->apellidos }}</td>
						<td>{{ $cliente->tipo_contacto }}</td>
						<td>{{ $cliente->identificacion }}</td>
						<td>{{ $cliente->tipo_identificacion }}</td>
						<td>{{ $cliente->alerta }}</td>
						<td>{{ $cliente->edad }}</td>
						<td>{{ $cliente->fecha_creacion }}</td>
						<td>{{ $cliente->ciudad_nacimiento }}</td>
		            </tr>
		        @endforeach
		    </tbody>
		</table>
	</div>
</body>
</html>