<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();        
        return view('proveedores.all')->with('proveedores', $proveedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $max = Proveedor::all()->max('codigo');        
        return view('proveedores.createForm', ['codigo_max'=>$max]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'codigo'       => 'required|unique:proveedores,codigo|numeric|digits_between:1,20',
            'nombre'       => 'required|max:200',
            'direccion'      => 'required|max:100',
            'telefono' => 'required|max:50'
        ])->flash();

        $proveedor = new Proveedor;
        $proveedor->codigo = $request->codigo;
        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->save();

        return redirect()
                ->route('proveedores.index')
                ->with('status', 'Proveedor a sido creado con éxito.');      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedore)
    {           
        return view('proveedores.show')
            ->with('proveedor', $proveedore);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedore)
    {
        return view('proveedores.edit')
            ->with('proveedor', $proveedore);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedore)
    {
        $this->validate($request, [        
            'nombre'       => 'required|max:200',
            'direccion'      => 'required|max:100',
            'telefono' => 'required|max:50'
        ])->flash();

        $proveedore->nombre      = $request->nombre;
        $proveedore->direccion   = $request->direccion;
        $proveedore->telefono    = $request->telefono;
        $proveedore->save();

        // redirect
        return redirect()
                ->route('proveedores.index')
                ->with('status', 'Proveedor a sido actualziado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedore)
    {        
        $proveedore->delete();

        // redirect
        return redirect()
                ->route('proveedores.index')
                ->with('status', 'Proveedor a sido eliminado con éxito.');
    }
}
