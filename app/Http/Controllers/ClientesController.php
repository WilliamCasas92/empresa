<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Clientes;
use Exception;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    private $path='clientes';

    public function index()
    {
        $clientes= DB::table('clientes')->get();;
        return view($this->path.'.index', compact('clientes'));
    }
  
    public function edit($id)
    {
        $cliente = Clientes::find($id);
        return view($this->path.'.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Clientes::find($id);
        $cliente->nombres           = $request->nombres;
        $cliente->apellidos         = $request->apellidos;
        $cliente->tipo_contacto     = $request->tipo_contacto;
        $cliente->identificacion    = $request->identificacion;
        $cliente->save();
        return redirect()->route('clientes.index')->with('mensaje', 'El cliente ha sido actualizado.');
    }
}
