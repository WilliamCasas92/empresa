@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido al Dashboard</div>
                <div class="panel-body">
                    <p>A continuación usted puede ver los clientes registrados en el sistema e importar un archivo CSV.</p>
                    <a href="{{ url('clientes') }}"><button class="btn btn-success">Ver Clientes</button></a>
                    <br><br><br>
                    <form action="{{ URL::to('importar_csv') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-4" for="InputCSV">Seleccione el archivo CSV:</label>
                            <div class="col-md-5">
                                <input type="file" name="arhivo_csv" />
                            </div>
                            <button class="btn btn-primary">Importar CSV</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
