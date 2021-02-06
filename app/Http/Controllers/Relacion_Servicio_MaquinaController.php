<?php

namespace App\Http\Controllers;


use App\Relacion_Servicio_Maquina;
use App\Maquina;
use App\Logs;

use Illuminate\Http\Request;

class Relacion_Servicio_MaquinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Relaciones = Relacion_Servicio_Maquina::get();
        $rellog = Logs::get();

        return view('Relaciones', compact('Relaciones'));
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
    public function ajaxRequestPost(Request $request)
    {
        $request->validate([
            'id_maquina'    => 'required',
            'id_servicio' =>   'required',
            'precio_hr' =>     'required',
            'num_hr' =>        'required',
            'valor' =>         'required'
        ]);
        Relacion_Servicio_Maquina::create([
            'id_maquina'    => request('id_maquina'),
            'id_servicio'    => request('id_servicio'),
            'precio_hr'    => request('precio_hr'),
            'num_hr'    => request('num_hr'),
            'valor'    => request('valor')
        ]);

        
        // return redirect()->route('servicios');
        // $input = $request->all();

        return response()->json(['success'=>'Got Simple Ajax Request.']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->identificador == 1){
            $relacion = Relacion_Servicio_Maquina::where('id_servicio', '=', 0)->update(['id_servicio' => $request->id_servicio]);
            return response()->json(['success'=>'Got Simple Ajax Request.']);
        }else if($request->identificador == 2){
            $relmaquina = Maquina::findOrFail($request->id_maquina);
            $relmaquina->horometro = $request->horometro;
            $relmaquina->save();

            $relacion = Relacion_Servicio_Maquina::findOrFail($request->id_relacion);
            $relacion->id_maquina = $request->id_maquina;
            $relacion->precio_hr = $request->precio_hr;
            $relacion->num_hr = $request->num_hr;
            $relacion->horas_encendido = $request->horas_encendido;
            $relacion->valor = $request->valor;
            $relacion->save();
        }else{
            $relmaquina = Maquina::findOrFail($request->id_maquina);
            $relmaquina->horometro = $request->horometro;
            $relmaquina->save();

            $relacion = Relacion_Servicio_Maquina::findOrFail($request->id_relacion);
            $relacion->id_maquina = $request->id_maquina;
            $relacion->precio_hr = $request->precio_hr;
            $relacion->num_hr = $request->num_hr;
            $relacion->horas_encendido = $request->horas_encendido;
            $relacion->valor = $request->valor;
            $relacion->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
