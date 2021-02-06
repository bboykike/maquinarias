<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\Operador;
use App\Maquina;
use App\Factura;
use App\Cliente;
use App\Relacion_Servicio_Maquina;
use App\Logs;
use Illuminate\Http\Request;
use App\Vendedor;

class LogsController extends Controller
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

        $logs = Logs::select('logs.id_logs','logs.id_relacion_fk',
        'servicios.id_servicio', 'maquinas.modelo', 'logs.hrmt_inicial', 'logs.hrmt_final',
        'logs.hrs_inactivo', 'logs.hrs_activo','maquinas.horometro','logs.created_at')
        ->join('relacion__servicio__maquinas', 'relacion__servicio__maquinas.id_relacion', '=', 'logs.id_relacion_fk')
        ->join('servicios', 'servicios.id_servicio', '=', 'relacion__servicio__maquinas.id_servicio')
        ->join('maquinas', 'maquinas.id_maquina', '=', 'relacion__servicio__maquinas.id_maquina')
        ->get();
    

        $servicios = Servicio::get();
        $operadores = Operador::get();
        $maquinas = Maquina::get();
        $facturas = Factura::get();
        $clientes = Cliente::get();
        $relacion = Relacion_Servicio_Maquina::get();
        $vendedores = Vendedor::get();
        return view('logs', compact('logs','servicios', 'maquinas', 'operadores', 'facturas', 'clientes', 'relacion', 'vendedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->validate([
            'horometro_inicial'    => 'required',
            'horometro' =>   'required',
            'horas_encendido' =>     'required',
            'horas_reposo' =>        'required',
            'valor' => 'required'
        ]);
        Logs::create([
            'id_relacion_fk' => request('id_relacion'),
            'hrmt_inicial'    => request('horometro_inicial'),
            'hrmt_final'    => request('horometro'),
            'hrs_activo'    => request('horas_encendido'),
            'hrs_inactivo'    => request('horas_reposo'),
            'num_hrs_ensendido'    => request('valor')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function show(Logs $logs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function edit(Logs $logs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logs $logs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logs  $logs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logs $logs)
    {
        //
    }
}
