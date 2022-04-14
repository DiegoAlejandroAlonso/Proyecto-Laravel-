<?php

namespace App\Http\Controllers;

use App\Models\detalleventa;
use App\Models\producto;
use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datoV['venta']=detalleventa::paginate(10);
        return view('venta.index',$datoV);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $producto['producto']= producto::all();
        $usuario['usuario']= usuario::all();

        return view('venta.create',$producto + $usuario);
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
        $campos=[
            
            'descripcion'=>'required|string|max:100',
            //'idProductoFK '=>'required|unique|max:20',
            //'idUsuarioFK '=>'required|unique|max:20',
            
        ];
        $this->validate($request,$campos);

        $datosVenta=request()->except('_token','Enviar');
        
        
        detalleventa::insert($datosVenta);
        //return response()->json($datosMarca);
        
        return redirect('venta/')->with('msn','producto agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detalleventa  $detalleventa
     * @return \Illuminate\Http\Response
     */
    public function show(detalleventa $detalleventa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detalleventa  $detalleventa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto['producto']= producto::all();
        $usuario['usuario']= usuario::all();

        $venta=detalleventa::findOrFail($id);
        return view('venta.edit',compact('venta'),$producto + $usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detalleventa  $detalleventa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            
            'descripcion'=>'required|string|max:100',
            //'idProductoFK '=>'required|unique|max:20',
            //'idUsuarioFK '=>'required|unique|max:20',
            
        ];
        $this->validate($request,$campos);

        $datosVenta=request()->except('_token','_method');
        
        detalleventa::where('id','=',$id)->update($datosVenta);
        
        //return view('Marca.edit',compact('marca'));
       
        return redirect('venta/')->with('msn','producto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detalleventa  $detalleventa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('detalleventas')->where('id','=',$id)->delete();
        return redirect('venta/')->with('msn','eliminado agregado exitosamente');
    }
}
