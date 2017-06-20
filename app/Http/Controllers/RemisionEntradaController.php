<?php

namespace App\Http\Controllers;

use App\RemisionEntrada;
use App\Proveedor;
use App\Almacen;
use Illuminate\Http\Request;

class RemisionEntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remisiones  = RemisionEntrada::all();

        foreach($remisiones as $remision) {            
            $proveedor = Proveedor::find($remision->proveedor_id);
            $almacen = Almacen::find($remision->almacen_id);
            $remision->proveedor_id = $proveedor->nombre;
            $remision->almacen_id = $almacen->nombre;
        }

        
        return view('remisiones.all')->with('remisiones', $remisiones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::all();    
        $almacenes = Almacen::all();
        $max = RemisionEntrada::all()->max('codigo');  
        return view('remisiones.createForm', [
            'proveedores'=>$proveedores,
            'almacenes'=>$almacenes,
            'codigo_max'=>$max
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
        $validate = $this->validate($request, [
            'codigo'       => 'required|unique:remision_entrada,codigo|numeric|digits_between:1,20',
            'proveedor_id'       => 'required|numeric',
            'almacen_id'       => 'required|numeric'
        ]);
        if($validate) {$validate->flash();}

        $proveedor = new RemisionEntrada;
        $proveedor->codigo = $request->codigo;
        $proveedor->proveedor_id = $request->proveedor_id;
        $proveedor->almacen_id = $request->almacen_id;
        $proveedor->estado = 1;
        $proveedor->save();

        return redirect()
                ->route('remisiones.index')
                ->with('status', 'Remisión de entrada a sido creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RemisionEntrada  $remisionEntrada
     * @return \Illuminate\Http\Response
     */
    public function show(RemisionEntrada $remisionEntrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RemisionEntrada  $remisionEntrada
     * @return \Illuminate\Http\Response
     */
    public function edit(RemisionEntrada $remisionEntrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RemisionEntrada  $remisionEntrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RemisionEntrada $remisionEntrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RemisionEntrada  $remisionEntrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(RemisionEntrada $remisione)
    {
        $remisione->delete();

        // redirect
        return redirect()
                ->route('remisiones.index')
                ->with('status', 'Remision eliminada.');
    }

    public function confirm(Request $request)
    {
        $remision = RemisionEntrada::find($request->id);
        $remision->estado = 2;
        $remision->save();

        // redirect
        return redirect()
                ->route('remisiones.index')
                ->with('status', 'Remision '.$remision->codigo.' confirmada.');
    }

}
