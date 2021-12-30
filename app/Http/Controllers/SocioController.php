<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use App\Models\Deuda;
use App\Models\Pago;


use Illuminate\Http\Request;

class SocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {   //               ('can:materias.index') aprobando permiso, ->only('index') solo para el metodo index
        $this->middleware('can:cruds');
    }

    public function index()
    {
        $socios=Socio::all();
        return view('socios.index',compact('socios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('socios.create');
        
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz");
        $socios=Socio::create([
            'codigo'=>request('codigo'),
            'ci'=>request('ci'),
            'nombre'=>request('nombre'),
            'telefono'=>request('telefono'),
            'direccion'=>request('direccion'),
            'estado_civil'=>request('estado_civil'),
            'nacionalidad'=>request('nacionalidad'),

        ]);
        return redirect()->route('socios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function show(Socio $socio)
    {
    }

    public function show_deudas(Socio $socio)
    {
        $deudas=Deuda::where('id_socio',$socio->id)->get();
        return view('socios.show_deuda',compact('deudas','socio'));
    }

    public function show_pagos(Socio $socio)
    {
        $pagos=Pago::where('id_socio',$socio->id)->get();
        return view('socios.show_pago',compact('pagos','socio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function edit(Socio $socio)
    {
        return view('socios.edit',compact('socio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Socio $socio)
    {
        date_default_timezone_set("America/La_Paz");
        $socio->codigo=$request->codigo;
        $socio->ci=$request->ci;
        $socio->nombre=$request->nombre;
        $socio->telefono=$request->telefono;
        $socio->direccion=$request->direccion;
        $socio->estado_civil=$request->estado_civil;
        $socio->nacionalidad=$request->nacionalidad;
        
        $socio->save();
        return redirect()->route('socios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socio $socio)
    {
        $socio->delete();
        return redirect()->route('socios.index');
    }
}
