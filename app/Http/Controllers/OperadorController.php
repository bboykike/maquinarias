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

class OperadorController extends Controller
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
        return view('operadores', compact('servicios', 'maquinas', 'operadores', 'facturas', 'clientes', 'relacion', 'logs', 'vendedores'));
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
        $fecha_nacimiento = request('fecha_nacimiento');
        $date = date("Y-m-d", strtotime($fecha_nacimiento));

        $request->validate([
            'nombre'           => 'required',
            'apellido'         => 'required',
            'telefono'         => 'required',
            'correo'           => ['required', 'email'],
            'direccion'        => 'required',
            'estado'           => 'required',
            'municipio'        => 'required',
            'fecha_contrato'   => 'required',
            'fecha_nacimiento' => 'required'
        ]);
        Operador::create([
            'nombre'           => request('nombre'),
            'apellido'         => request('apellido'),
            'telefono'         => request('telefono'),
            'correo'           => request('correo'),
            'municipio'        => request('municipio'),
            'estado'           => request('estado'),
            'direccion'        => request('direccion'),
            'estatus'          => 'activo',
            'fecha_contrato'   => request('fecha_contrato'),
            'num_imss'         => request('num_imss'),
            'tipo_sangre'      => request('tipo_sangre'),
            'fecha_nacimiento' => $date
        ]);
        $notification = array(
            'message' => 'Operador agregado correctamente',
            'alert-type' => 'AddOperador'
        );
        return redirect()->route('operadores')->with($notification);
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
        $operador = Operador::findOrFail($request->id_operador);
        $operador->nombre = $request->nombre;
        $operador->apellido = $request->apellido;
        $operador->telefono = $request->telefono;
        $operador->correo = $request->correo;
        $operador->municipio = $request->municipio;
        $operador->estado = $request->estado;
        $operador->direccion = $request->direccion;
        $operador->estatus = $estatus;
        $operador->num_imss = $request->num_imss;
        $operador->tipo_sangre = $request->tipo_sangre;
        $operador->save();
        $notification = array(
            'message' => 'Operador actualizado correctamente',
            'alert-type' => 'UpOperador'
        );
        return redirect()->route('operadores')->with($notification);      
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
