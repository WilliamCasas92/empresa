<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Clientes;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class EmailController extends Controller
{
	public function enviar_email()
	{
		$data = array('name'=>"Empresa A");
		//Procesamiento PDF
		$clientes = \DB::table("clientes")->get();
    $pdf = \PDF::loadView('vistapdf', compact('clientes'))->setPaper('a4', 'landscape')->save(public_path('./correos/clientes_pdf.pdf'));

    //Procesamiento Excel
    $clientes_excel = Clientes::get()->toArray();
    $excelFile = \Excel::create('clientes_excel', function($excel) use ($clientes_excel) {
    	$excel->sheet('mySheet', function($sheet) use ($clientes_excel)
    	{
				$sheet->fromArray($clientes_excel);
			});
    	})->store('xlsx', public_path('./correos/'));
    
  	//Envio de Email
  	Mail::send('correoclientes', $data, function($message) {
      $message->from('emails.testing.will@gmail.com','Empresa A')
      				->to(\Auth::user()->email, \Auth::user()->name)
      				->subject('Clientes Actualizados')
      				->attach('./correos/clientes_pdf.pdf')
      				->attach('./correos/clientes_excel.xlsx');
    });
    return view('emailenviado');
   }
}