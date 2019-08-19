<?php

namespace App\Http\Controllers;

use App\Permitido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;

class PermitidosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario_logado = Session::get('usuario');

        if ($usuario_logado == 'diretor@dfbordados.com.br') {
            
            $permitidos = Permitido::latest()->paginate(5);
            $registrados = User::latest()->paginate(5);
  
            return view('permitidos.index',compact('permitidos', 'registrados'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            return redirect()->to('/home'); 
        }
        
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $usuario_logado = Session::get('usuario');

        if ($usuario_logado == 'diretor@dfbordados.com.br') {
            return view('permitidos.create');
         } else {
            return redirect()->to('permitidos.index'); 
        }
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);
  
        Permitido::create($request->all());
   
        return redirect()->route('permitidos.index')
                        ->with('success','Permitido created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Permitido  $permitido
     * @return \Illuminate\Http\Response
     */
    public function show(Permitido $permitido)
    {
         $usuario_logado = Session::get('usuario');

        if ($usuario_logado == 'diretor@dfbordados.com.br') {
            return view('permitidos.show',compact('permitido'));
        } else {
            return redirect()->to('/home'); 
        }
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permitido  $permitido
     * @return \Illuminate\Http\Response
     */
    public function edit(Permitido $permitido)
    {
        return view('permitidos.edit',compact('permitido'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permitido  $permitido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permitido $permitido)
    {
        $request->validate([
            'email' => 'required',
        ]);
  
        $permitido->update($request->all());
  
        return redirect()->route('permitidos.index')
                        ->with('success','Permitido updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permitido  $permitido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permitido $permitido)
    {
        $permitido->delete();
  
        return redirect()->route('permitidos.index')
                        ->with('success','Permitido deleted successfully');
    }
}
