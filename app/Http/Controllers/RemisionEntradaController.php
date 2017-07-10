<?php

namespace App\Http\Controllers;

use App\RemisionEntradaDetalle;
use App\RemisionEntrada;
use App\Proveedor;
use App\Producto;
use App\InventarioFisico;
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
        $remisiones  = RemisionEntrada::paginate(5);

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
                ->with('status', 'Remisión de entrada a sido creado con éxito.')
                ->with('alert', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RemisionEntrada  $remisionEntrada
     * @return \Illuminate\Http\Response
     */
    public function show(RemisionEntrada $remisione)
    {
        $proveedores = Proveedor::all();    
        $almacenes = Almacen::all();
        $productos = Producto::all();

        $productos_actuales = RemisionEntradaDetalle::where('idRemisionEntrada', $remisione->id)->get();
        foreach($productos_actuales as $p)
        {
            $p->nombre = Producto::find($p->idProducto)->nombre;
        }
        return view('remisiones.show', [
                'remision' => $remisione,
                'proveedores' => $proveedores,
                'almacenes' => $almacenes,
                'productos' => $productos,
                'productos_actuales' => $productos_actuales,
            ]);
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
    public function update(Request $request, RemisionEntrada $remisione)
    {
        $validate = $this->validate($request, [        
            'proveedor_id'       => 'required|numeric|max:200',
            'almacen_id'      => 'required|numeric|max:100'            
        ]);
        if($validate) {$validate->flash();}

        $remisione->proveedor_id      = $request->proveedor_id;
        $remisione->almacen_id   = $request->almacen_id;        
        $remisione->save();

        // redirect
        return redirect()
                ->route('remisiones.show',['id'=>$remisione->id])
                ->with('status', 'Actualizada con exito.')
                ->with('alert', 'success');
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

    public function anular(Request $request)
    {        
        $remision = RemisionEntrada::find($request->id);
        $remision->estado = 3;
        $remision->save();

        // redirect
        return redirect()
                ->route('remisiones.index')
                ->with('status', 'Remision '.$remision->codigo.' anulada.')
                ->with('alert', 'success');
    }  

    public function add_producto(Request $request)
    {
        $validate = $this->validate($request, [
            'idRemisionEntrada'       => 'required|numeric',
            'idProducto'       => 'required|numeric',
            'cantidad'       => 'required|numeric|max:200'
        ]);
        if($validate) {$validate->flash();}

        $r = RemisionEntradaDetalle::where('idRemisionEntrada', $request->idRemisionEntrada)
                ->where('idProducto', $request->idProducto)
                ->get();

        if(count($r)>0)        
        {
            return redirect()
                    ->route('remisiones.show',['id'=>$request->idRemisionEntrada])
                    ->with('status', 'No se puede agregar dos veces el mismo producto al detalle de la remisión de entrada.')
                    ->with('alert', 'danger');
        }
        else

        {
            $n = new RemisionEntradaDetalle;
            $n->idRemisionEntrada = $request->idRemisionEntrada;
            $n->idProducto = $request->idProducto;
            $n->cantidad = $request->cantidad;
            $n->save();

            return redirect()->action(
                'RemisionEntradaController@show', ['id' => $request->idRemisionEntrada]
            );

        }
    }    

    public function confirm(Request $request)
    {
        $idAlmacen = Almacen::where('nombre', $request->idAlmacen)->pluck('id')[0];
        
        $rDetalle = RemisionEntradaDetalle::where('idRemisionEntrada', $request->id)->get();
        $remision = RemisionEntrada::find($request->id);
        if(count($rDetalle)>0) {
            
            $remision->estado = 2;
            $remision->save();


            $productos_actuales = RemisionEntradaDetalle::where('idRemisionEntrada', $request->id)->get();

            foreach($productos_actuales as $prod) {

                $produc_exits = InventarioFisico::where('idAlmacen', $idAlmacen)
                        ->where('idProducto', $prod->idProducto)
                        ->get();

                if(count($produc_exits) > 0) {
                    InventarioFisico::where('idAlmacen', $idAlmacen)
                        ->where('idProducto', $prod->idProducto)
                        ->increment('cantidad', $prod->cantidad);
                }
                else
                {
                    $i = new InventarioFisico;
                    $i->idAlmacen = $idAlmacen;
                    $i->idProducto = $prod->idProducto;
                    $i->cantidad = $prod->cantidad;
                    $i->save();
                }                
            }

            // redirect
            return redirect()
                    ->route('remisiones.index')
                    ->with('status', 'Remision '.$remision->codigo.' confirmada.');
        }
        else{
            return redirect()
                    ->route('remisiones.index')
                    ->with('status', 'La Remision ['.$remision->codigo.'] no tiene productos y no se puede confirmar.')
                    ->with('alert', 'danger');
        }

        
    }

}
