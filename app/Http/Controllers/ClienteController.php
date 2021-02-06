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

class ClienteController extends Controller
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
        $vendedores = Vendedor::get();
        $logs = Logs::get();
        return view('clientes', compact('servicios', 'maquinas', 'operadores', 'facturas', 'clientes', 'relacion', 'logs', 'vendedores'));

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

        #validacion
        list($rules, $messages) = $this->_rules();
        $this->validate($request, $rules, $messages);
        
        $clientes = new Cliente();

        $clientes->nombre = $request->input('nombre');
        $clientes->apellido = $request->input('apellido');
        $clientes->telefono = $request->input('telefono');
        $clientes->correo = $request->input('correo');
        $clientes->estado = $request->input('estado');
        $clientes->municipio = $request->input('municipio');
        $clientes->direccion = $request->input('direccion');
        $clientes->estatus='activo';

        $clientes->save();
        $notification = array(
            'message' => 'Cliente agregado correctamente',
            'alert-type' => 'nuevo'
        );
        return redirect()->route('clientes')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        #validacion
        list($rules, $messages) = $this->_rules();
        $this->validate($request, $rules, $messages);
        if(!empty($request->estatus)){
            $estatus='activo';
        }else{
            $estatus='inactivo';
        }
        $clientes = Cliente::findOrFail($request->id_cliente);
        $clientes->nombre = $request->nombre;
        $clientes->apellido = $request->apellido;
        $clientes->telefono = $request->telefono;
        $clientes->correo = $request->correo;
        $clientes->municipio = $request->municipio;
        $clientes->estado = $request->estado;
        $clientes->direccion = $request->direccion;
        $clientes->estatus = $estatus;
        $clientes->save();
        $notification = array(
            'message' => 'Cliente actualizado correctamente',
            'alert-type' => 'actualizar'
        );
        return redirect()->route('clientes')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    private function _rules(){
        $messages = [
            'nombre.required' => 'Ingrese el nombre del cliente',
            'apellido.required' => 'Ingrese el apellido del cliente',
            'telefono.required' => 'Ingrese el teléfono del cliente',
            'correo.required' => 'Ingrese el correo del cliente',
            'estado.required' => 'Seleccione el estado',
            'municipio.required' => 'Seleccione el municipio',
            'direccion.required' => 'Ingrese la dirección del cliente'
          
        ];

        $rules = [
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'estado' => 'required',
            'municipio' => 'required',
            'direccion' => 'required'
        ];

        return array($rules, $messages);
    }    
}
