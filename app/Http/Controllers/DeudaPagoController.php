<?php

namespace App\Http\Controllers;

use App\Models\DeudaPago;
use App\Models\Socio;
use App\Models\Deuda;
use App\Models\Pago;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class DeudaPagoController extends Controller
{
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
    public function create_detalle(Socio $socio){
        $deudas=DB::select("SELECT * FROM deudas WHERE id_socio=$socio->id AND estado='no cancelada'");
        $pago=Pago::all()->last();
        $deuda_pagos=DeudaPago::where('id_pago',$pago->id)->get();
        return view('deuda_Pagos.create',compact('deudas','pago','socio','deuda_pagos'));
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
            'id_deuda'=>'required'
        ]);
        $deuda_pagos=DeudaPago::create([
            'id_deuda'=>$request->id_deuda,
            'id_pago'=>Pago::all()->last()->id,
        ]);

        $deuda=Deuda::find($request->id_deuda);
        $deuda->update([
            'estado'=>"CANCELADO",
        ]);

        $pago=Pago::all()->last();
        $pago->update([
            'total'=>$deuda->monto+$pago->total,
            'deudas_pagadas'=>$pago->deudas_pagadas+1,
        ]);
        
        $socio=Socio::find($request->id_socio);
        return redirect()->route('deuda.pagos.create',$socio); 
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeudaPago  $deudaPago
     * @return \Illuminate\Http\Response
     */
    public function show(DeudaPago $deudaPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeudaPago  $deudaPago
     * @return \Illuminate\Http\Response
     */
    public function edit(DeudaPago $deudaPago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeudaPago  $deudaPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeudaPago $deudaPago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeudaPago  $deudaPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeudaPago $deudaPago)
    {
        $pago=Pago::find($deudaPago->id_pago);
        $deuda=Deuda::find($deudaPago->id_deuda);
        
        $pago->update([
            'total'=>$pago->total-$deuda->monto,
            'deudas_pagadas'=>$pago->deudas_pagadas-1,
        ]);

        $deuda->update([
            'estado'=>"NO CANCELADA",
        ]);

        $socio=Socio::find($pago->id_socio);
        $deudaPago->delete();
        return redirect()->route('deuda.pagos.create',$socio); 
    }
}
