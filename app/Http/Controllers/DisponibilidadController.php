<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\Operador;
use App\Maquina;
use App\Factura;
use App\Cliente;
use App\Disponibilidad;
use App\Logs;
use App\Vendedor;
use App\Relacion_Servicio_Maquina;

use Illuminate\Http\Request;

class DisponibilidadController extends Controller
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
        $logs = Logs::get();
        $vendedores = Vendedor::get();
        $relacion = Relacion_Servicio_Maquina::get();
        return view('disponibilidad', compact('servicios', 'maquinas', 'operadores', 'facturas', 'clientes', 'relacion', 'logs', 'vendedores'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disponibilidad  $disponibilidad
     * @return \Illuminate\Http\Response
     */
    public function show(Disponibilidad $disponibilidad)
    {
        $data['servicios'] = Servicio::select('municipio AS description', 'title', 'start', 'color')
                            ->where('estatus', 'activo')
                            ->get();
        return response()->json($data['servicios']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disponibilidad  $disponibilidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Disponibilidad $disponibilidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disponibilidad  $disponibilidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disponibilidad $disponibilidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disponibilidad  $disponibilidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disponibilidad $disponibilidad)
    {
        //
    }
}
