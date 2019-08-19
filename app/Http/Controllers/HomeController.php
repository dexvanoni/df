<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Socialite;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*public function index()
    {
        return view('home');
    }*/

        public function index()
    {
        $email = Auth::user()->email;
        $id = Auth::user()->id;
        $nome = Auth::user()->name;

        // se o usuário existe na tabela permitidos, ele entra, se não, sai
        $consulta = DB::table('permitidos')->where('email', '=', $email)->count();
        $permitido = DB::table('permitidos')->where('email', '=', $email)->first();

        //$consulta = 1;
        $con_parametros = DB::table('parametros')->where('usuario', '=', $id)->count();
        $parametros = DB::table('parametros')->where('usuario', '=', $id)->first();

        Session::put('usuario', $email);
        if ($consulta == 0) {
            Session::flush();
            return redirect('/')
                        ->with('success','Você ainda não possui acesso à Calculadora de Bordados Eletrônicos.');
                }else{
                    if ($email == 'diretor@dfbordados.com.br') {
                        return redirect()->to('administracao');
                    }

                    $dt_exp = Carbon::parse($permitido->created_at)->addYear(1);
                    $dt_now = Carbon::now();

                        if($dt_exp->gt($dt_now)){
                            
                            Session::put('usuario', $email);
                            //if ($user->email == 'dex.vanoni@gmail.com') {
                            //    return redirect()->to('administracao');
                            //}else{
                                if ($con_parametros > 0) {
                                   Session::put('novo', 'n');
                                }else{
                                    $parametros = collect([]);
                                    Session::put('novo', 'y');
                                }
                                return view('home', compact('parametros', 'con_parametros'));        
                         } else {
                            Session::flush();
                            return redirect('/')
                                ->with('success','Seu acesso já expirou!! Favor clicar em Solicitar Acesso.');
                         }
                

                
               // }
                
            }        
    }
}
