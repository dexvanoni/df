<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

class MailController extends Controller
{
    public function envio(Request $request){
    	
    	//dd($request);
    	//exit;

    	$para = 'diretor@dfbordados.com.br';
      	
      	Mail::send('mail.ctt', ['para' => $para, 'dados' => $request], function($m) use ($para){
        	$m->from('denis.vanoni@dfbordados.com.br', 'Denis - CTT');
        	$m->subject('Novo Contato do Site');
        	$m->to($para);      
    	});
    	return redirect()->route('inicio');
	}
}