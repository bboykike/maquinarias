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

class ServicioController extends Controller
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
        $servicios = Servicio::select('operadors.nombre', 'operadors.apellido', 'servicios.id_servicio', 'servicios.title', 'servicios.start', 'servicios.direccion', 'servicios.municipio', 'servicios.estado', 'servicios.id_rfc', 'servicios.cfdi', 'servicios.monto_facturacion', 'servicios.estatus', 'servicios.id_cliente', 'servicios.id_operador', 'servicios.razon_cancelacion', 'servicios.id_vendedor' )
                ->join('operadors', 'servicios.id_operador', '=', 'operadors.id_operador')
                ->get();
        $operadores = Operador::get();
        $maquinas = Maquina::get();
        $facturas = Factura::get();
        $clientes = Cliente::get();
        $relacion = Relacion_Servicio_Maquina::get();
        $logs = Logs::get();
        $vendedores = Vendedor::get();
        return view('servicios', compact('servicios', 'maquinas', 'operadores', 'facturas', 'clientes', 'relacion', 'logs', 'vendedores'));
    }

    // public function getid(){
    //     $servicios = Servicio::orderby('id_servicio','asc')->select('*')->get();
    //     return json_encode($servicios);
    //     // return response()->json(array('success' => true, 'id_servicio' => $servicios));
    // }

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
            'nombre' => 'required',
            'id_cliente' => 'required',
            'id_operador' => 'required',
            'id_vendedor' => 'required',
            'direccion' => 'required',
            'municipio' => 'required',
            'estado' => 'required',
            'monto_facturacion' => 'required'

        ]);
        Servicio::create([
            'title'    => request('nombre'),
            'start'    => request('fecha_realizacion'),
            'id_cliente'    => request('id_cliente'),
            'id_operador'    => request('id_operador'),
            'id_vendedor'  => request('id_vendedor'),
            'direccion'    => request('direccion'),
            'municipio'    => request('municipio'),
            'estado'    => request('estado'),
            'id_rfc'    => request('rfc'),
            'cfdi'    => request('cfdi'),
            'monto_facturacion'    => request('monto_facturacion'),
            'color' => '#ffc107',
            'estatus' => 'activo'
        ]);
        
        

        $servicio1 = Servicio::orderBy('created_at', 'DESC')->first();

        $servicio2 = Relacion_Servicio_Maquina::where('id_servicio', '=', 0)->update(['id_servicio' => $servicio1->id_servicio]);
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
        $notification = array(
            'message' => 'Servicio Actualizado correctamente',
            'alert-type' => 'UpdateServicio'
        );
        if(!empty($request->rfcfac)){
            Factura::create([
                'id_rfc'    => request('rfcfac'),
                'nombre_fiscal'    => request('nombre_fiscal'),
                'direccion_fiscal'    => request('direccion_fiscal'),
                'codigo_postal'    => request('codigo_postal'),
                'idcopia'         => request('rfcfac')
            ]);
            if(!empty($request->estatus)){
                $estatus='inactivo';
            }else{
                $estatus='activo';
            }
            $servicio = Servicio::findOrFail($request->id_servicio);
            $servicio->id_cliente = $request->idcliente;
            $servicio->id_operador = $request->idoperador;
            $servicio->start = $request->fecha_realizacion;
            $servicio->direccion = $request->direccion;
            $servicio->estado = $request->estado;
            $servicio->municipio = $request->municipio;
            $servicio->id_rfc = $request->rfcfac;
            $servicio->cfdi = $request->cfdiadd3;
            $servicio->monto_facturacion = $request->montohidden;
            $servicio->razon_cancelacion = $request->razon_cancelacion;
            $servicio->estatus = $estatus;
            $servicio->save();
            
            return redirect()->route('servicios')->with($notification);
        }
        if(!empty($request->estatuscancelado)){

            list($rules, $messages) = $this->_rules();
            $this->validate($request, $rules, $messages);

            $estatus = 'cancelado';
        }else{
            if(!empty($request->estatus)){
                $estatus='inactivo';
            }else{
                $estatus='activo';
            }
        }
        $servicio = Servicio::findOrFail($request->id_servicio);
        $servicio->id_cliente = $request->idcliente;
        $servicio->id_operador = $request->idoperador;
        $servicio->start = $request->fecha_realizacion;
        $servicio->direccion = $request->direccion;
        $servicio->estado = $request->estado;
        $servicio->municipio = $request->municipio;
        $servicio->id_rfc = $request->rfchidden;
        $servicio->cfdi = $request->cfdihidden;
        $servicio->monto_facturacion = $request->montohidden;
        $servicio->razon_cancelacion = $request->razon_cancelacion;
        $servicio->estatus = $estatus;
        $servicio->save();




        $notification = array(
            'message' => 'Servicio Actualizado correctamente',
            'alert-type' => 'UpdateServicio'
        );
        return redirect()->route('servicios')->with($notification);
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

    private function _rules(){
        $messages = [
            'razon_cancelacion.required' => 'Selecciona la razon de perdida del servicio' 
          
        ];

        $rules = [
            'razon_cancelacion' => 'required'
        ];

        return array($rules, $messages);
    }    

}
