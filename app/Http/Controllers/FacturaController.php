<?php

namespace App\Http\Controllers;


use App\Factura;

use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::get();

        return view('facturas', compact('facturas'));
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
            'id_rfc'    => 'required',
            'nombre_fiscal' => 'required',
            'direccion_fiscal' => 'required',
            'codigo_postal' => 'required',
            'idcopia' => 'required'
        ]);
        Factura::create([
            'id_rfc'    => request('id_rfc'),
            'nombre_fiscal'    => request('nombre_fiscal'),
            'direccion_fiscal'    => request('direccion_fiscal'),
            'codigo_postal'    => request('codigo_postal'),
            'idcopia'         => request('idcopia'),
            'estatus' => 'activo'
        ]);
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
    // public function update(Request $request)
    // {
    //     if(!empty($request->estatus)){
    //         $estatus='activo';
    //     }else{
    //         $estatus='inactivo';
    //     }
    //     $factura = Factura::findOrFail($request->id_factura);
    //     // $servicio->modelo = $request->modelo;
    //     $factura->estatus = $estatus;
    //     $factura->save();
    //     return redirect()->route('facturas');
    // }

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
