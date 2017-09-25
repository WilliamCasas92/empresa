<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clientes;

class ArchivoController extends Controller 
{
    //Sube los clientes del CSV a la BD
    public function importarArchivoBD(Request $request){
        if($request->hasFile('arhivo_csv')){
            $path = $request->file('arhivo_csv')->getRealPath();
            $data = \Excel::setDelimiter(';')->load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = [ 'nombres' => $value->nombres,
                            'apellidos' => $value->apellidos,
                            'tipo_contacto' => $value->tipo_contrato,
                            'identificacion' => $value->identificacion,
                            'tipo_identificacion' => $value->tipo_identificacion,
                            'alerta' => $value->alerta,
                            'edad' => $value->edad,
                            'fecha_creacion' => $value->fecha_creacion,
                            'ciudad_nacimiento' => $value->ciudad_nacimiento
                        ];
                }
                if(!empty($arr)){
                    \DB::table('clientes')->insert($arr);
                    return redirect()->route('clientes.index');
                }
            }
        }
        return redirect()->route('home');      
    } 

    //Genera Excel y descarga
    public function descargaExcel($type){
        $clientes = Clientes::get()->toArray();
        return \Excel::create('clientes_excel', function($excel) use ($clientes) {
            $excel->sheet('clientes', function($sheet) use ($clientes)
            {
                $sheet->fromArray($clientes);
            });
        })->download($type);
    } 

    //Genera PDF y descarga
    public function descargaPDF(Request $request)
    {
        $clientes = \DB::table("clientes")->get();
        view()->share('clientes',$clientes);
        if($request->has('download')){
            $pdf = \PDF::loadView('vistapdf');
            return $pdf->setPaper('a4', 'landscape')->download('clientes_pdf.pdf');
        }
        return view('vistapdf');
    }     
}