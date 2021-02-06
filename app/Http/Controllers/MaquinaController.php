<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\Operador;
use App\Maquina;
use App\Factura;
use App\Cliente;
use App\Relacion_Servicio_Maquina;
use App\Logs;
use App\Vendedor;

use Illuminate\Http\Request;

class MaquinaController extends Controller
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
        $servicios = Servicio::get();
        $operadores = Operador::get();
        $maquinas = Maquina::get();
        $facturas = Factura::get();
        $clientes = Cliente::get();
        $relacion = Relacion_Servicio_Maquina::get();
        $logs = Logs::get();
        $vendedores = Vendedor::get();
        return view('maquinas', compact('servicios', 'maquinas', 'operadores', 'facturas', 'clientes', 'relacion', 'logs', 'vendedores'));

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
            'modelo'    => 'required',
            'horometro'    => 'required',
            'tipo'    => 'required',
            'anio'    => 'required',
        ]);
        Maquina::create([
            'modelo'    => request('modelo'),
            'horometro' => request('horometro'),
            'tipo' => request('tipo'),
            'anio' => request('anio'),
            'estatus' => 'activo'
        ]);
        $notification = array(
            'message' => 'Maquina agregada correctamente',
            'alert-type' => 'AddMaquina'
        );
        return redirect()->route('maquinas')->with($notification);
        
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
        if(!empty($request->estatus)){
            $estatus='activo';
        }else{
            $estatus='inactivo';
        }
        $operador = Maquina::findOrFail($request->id_maquina);
        $operador->modelo = $request->modelo;
        $operador->horometro = $request->horometro_edit;
        $operador->tipo = $request->tipo_edit;
        $operador->anio = $request->anio_edit;
        $operador->estatus = $estatus;
        $operador->save();
        $notification = array(
            'message' => 'Maquina actualizada correctamente',
            'alert-type' => 'UpMaquina'
        );
        return redirect()->route('maquinas')->with($notification);
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
