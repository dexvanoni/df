<?php

namespace App\Http\Controllers;

use App\Parametro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ParametrosController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'entretela' => 'required',
            'tnt' => 'required',
            'linha_sup' => 'required',
            'linha_bob' => 'required',
            'pontos_min' => 'required',
        ]);

        Parametro::create($request->all());
   
        return redirect()->route('home')
                        ->with('success','Parâmetros salvos com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function show(Parametro $parametro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function edit(Parametro $parametro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parametro $parametros)
    {

        $parametros = Parametro::where('usuario', '=', $request->usuario)->first();
        $parametros->usuario =  $request->usuario;
        $parametros->entretela =  $request->entretela;
        $parametros->tnt =  $request->tnt;
        $parametros->linha_sup =  $request->linha_sup;
        $parametros->linha_bob =  $request->linha_bob;
        $parametros->pontos_min =  $request->pontos_min;
        $parametros->save();

        return redirect()->route('home')
            ->with('success','Parâmetros atualizados com sucesso');
                        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parametro $parametros)
    {
        //
    }
}
