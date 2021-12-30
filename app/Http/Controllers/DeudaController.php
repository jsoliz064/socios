<?php

namespace App\Http\Controllers;

use App\Models\Deuda;
use App\Models\Socio;

use Illuminate\Http\Request;

class DeudaController extends Controller
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
        $deudas=Deuda::all();
        return view('deudas.index',compact('deudas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socios=Socio::All();
        return view('deudas.create',compact('socios'));
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
            'descripcion'=>'required',
            'monto'=>'required',
        ]);
        if ($request->id_socio <>"null"){
            $deudas=Deuda::create([
                'id_socio'=>request('id_socio'),
                'descripcion'=>request('descripcion'),
                'monto'=>request('monto'),
                'estado'=>"NO CANCELADA",
            ]);
            return redirect()->route('deudas.index');
        }else{
            return redirect()->route('deudas.create')->with('status','Seleccione un Socio');
        }
    }
    public function store_socio_deuda(Request $request,Socio $socio)
    {
        
        date_default_timezone_set("America/La_Paz");
        $request->validate([
            'descripcion'=>'required',
            'monto'=>'required',
        ]);
        $deudas=Deuda::create([
            'id_socio'=>$socio->id,
            'descripcion'=>request('descripcion'),
            'monto'=>request('monto'),
            'estado'=>"NO CANCELADA",
        ]);
        return redirect()->route('socios.deuda',$socio);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deuda  $deuda
     * @return \Illuminate\Http\Response
     */
    public function show(Deuda $deuda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deuda  $deuda
     * @return \Illuminate\Http\Response
     */
    public function edit(Deuda $deuda)
    {
        $socio_datos=Socio::find($deuda->id_socio);
        $socios=Socio::where('id','<>',$deuda->id_socio)->get();
        return view('deudas.edit',compact('deuda','socio_datos','socios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deuda  $deuda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deuda $deuda)
    {
        date_default_timezone_set("America/La_Paz");
        $deuda->id_socio =$request->id_socio;
        $deuda->descripcion=$request->descripcion;
        $deuda->monto=$request->monto;
        $deuda->save();
        return redirect()->route('deudas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deuda  $deuda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deuda $deuda)
    {
        $deuda->delete();
        return redirect()->route('deudas.index');
    }

    public function destroy_socio_deuda(Deuda $deuda)
    {
        $socio=Socio::find($deuda->id_socio);
        $deuda->delete();
        return redirect()->route('socios.deuda',$socio);
    }
}
