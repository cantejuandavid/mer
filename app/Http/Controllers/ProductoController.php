<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();        
        return view('productos.all')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $max = Producto::all()->max('codigo');    
        return view('productos.createForm', ['codigo_max'=>$max]);
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
            'codigo'       => 'required|unique:productos,codigo|numeric|digits_between:1,20',
            'nombre'       => 'required|max:200',
            'descripcion'      => 'required',
            'unidad'      => 'required',
            'precio_venta' => 'required|numeric|min:1',
            'StockMinimo' => 'required|numeric|min:1',
            'StockMaximo' => 'required|numeric|min:1'
        ]);
        if($validate) {$validate->flash();}

        $producto = new Producto;
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->unidad = $request->unidad;
        $producto->precio_venta = $request->precio_venta;
        $producto->StockMinimo = $request->StockMinimo;
        $producto->StockMaximo = $request->StockMaximo;
        $producto->save();

        return redirect()
                ->route('productos.index')
                ->with('status', 'Producto a sido creado con éxito.');      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {           
        return view('productos.show')
            ->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit')
            ->with('producto', $producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {        
        $this->validate($request, [
            'nombre'       => 'required|max:200',
            'descripcion'      => 'required',
            'unidad'    => 'required',
            'precio_venta' => 'required|numeric|min:1',
            'StockMinimo' => 'required|numeric|min:1',
            'StockMaximo' => 'required|numeric|min:1',

        ]);

        $producto->nombre      = $request->nombre;
        $producto->descripcion   = $request->descripcion;
        $producto->unidad       = $request->unidad;
        $producto->precio_venta    = $request->precio_venta;
        $producto->StockMinimo    = $request->StockMinimo;
        $producto->StockMaximo    = $request->StockMaximo;
        $producto->save();

        // redirect
        return redirect()
                ->route('productos.index')
                ->with('status', 'Producto a sido actualziado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {        
        $producto->delete();

        // redirect
        return redirect()
                ->route('productos.index')
                ->with('status', 'Producto a sido eliminado con éxito.');
    }
}
