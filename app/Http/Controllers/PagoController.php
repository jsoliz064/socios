<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Socio;
use App\Models\Deuda;
use App\Models\DeudaPago;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos=Pago::all();
        return view('pagos.index',compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socios=Socio::all();
        return view('pagos.create',compact('socios'));
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
        $request->validate([
            'id_socio'=>'required'
        ]);

        $socio=Socio::find($request->id_socio);
        $pago=Pago::create([
            'id_socio' => $socio->id,
            'total'=>0,
            'deudas_pagadas'=>0,
        ]);
        return redirect()->route('deuda.pagos.create',$socio); 
    }

    public function store_socio(Socio $socio)
    {
        $pago=Pago::create([
            'id_socio' => $socio->id,
            'total'=>0,
            'deudas_pagadas'=>0,
        ]);
        return redirect()->route('deuda.pagos.create',$socio); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        $socio=Socio::find($pago->id_socio);
        $deudas=DB::select("SELECT * FROM deudas WHERE id IN(SELECT id_deuda FROM deuda_pagos WHERE id_pago=$pago->id)");
        return view('deuda_Pagos.show',compact('pago','socio','deudas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        $socio=Socio::find($pago->id_socio);
        $deudas=DB::select("SELECT * FROM deudas WHERE id IN(SELECT id_deuda FROM deuda_pagos WHERE id_pago=$pago->id)");
        if ($deudas) {
            foreach($deudas as $deuda){
                $dato=Deuda::find($deuda->id);
                $dato->update([
                    'estado'=>"NO CANCELADA",
                ]);
            }
        }
        //dd($deudas);
        $pago->delete();
        return redirect()->route('pagos.index');
    }
    public function destroy_socio_pago(Pago $pago)
    {
        $socio=Socio::find($pago->id_socio);
        $deudas=DB::select("SELECT * FROM deudas WHERE id IN(SELECT id_deuda FROM deuda_pagos WHERE id_pago=$pago->id)");
        if ($deudas) {
            foreach($deudas as $deuda){
                $dato=Deuda::find($deuda->id);
                $dato->update([
                    'estado'=>"NO CANCELADA",
                ]);
            }
        }
        $pago->delete();
        return redirect()->route('socios.pago',$socio);
    }
}
