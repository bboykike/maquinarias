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

class VendedorController extends Controller
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
        return view('vendedores', compact('vendedores' ,'servicios', 'maquinas', 'operadores', 'facturas', 'clientes', 'relacion', 'logs'));

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
            'nombreven'    => 'required',
            'apellidoven'  => 'required'
        ]);
        Vendedor::create([
            'nombre'    => request('nombreven'),
            'apellido' => request('apellidoven'),
            'estatus' => 'activo'
        ]);
        $notification = array(
            'message' => 'Vendedor agregado correctamente',
            'alert-type' => 'AddVendedor'
        );
        return redirect()->route('vendedores')->with($notification);
        
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
        if(!empty($request->estatusvendedored)){
            $estatus='activo';
        }else{
            $estatus='inactivo';
        }
        $vendedores = Vendedor::findOrFail($request->id_vendedor);
        $vendedores->estatus = $estatus;
        $vendedores->save();
        $notification = array(
            'message' => 'Vendedor actualizado correctamente',
            'alert-type' => 'UpdateVendedor'
        );
        return redirect()->route('vendedores')->with($notification);
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
