<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marca['marca']= Marca::all();
        $producto = producto::all();
        return view('producto.index', compact('producto'),$marca);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $marca['marca']= Marca::all();
        return view('producto.create',$marca);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $campos=[
            'nombreProducto'=>'required|string',
            'costo'=>'required|string',
            'precio'=>'required|string',
            'cantidad'=>'required|string',
            'Foto'=>"required|image|mimes:jpeg,png|max:5000",
            //'idMarcaFK '=>'required|unique|max:20',
        ];
        $this->validate($request,$campos);

        $datosProducto=request()->except('_token','Enviar');
        
        if($request->hasFile('Foto')){
            $datosProducto['Foto']=$request->file('Foto')->store('uploads','public');
        }
        producto::insert($datosProducto);
        //return response()->json($datosMarca);
        return redirect('producto/')->with('msn','producto agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca['marca']= Marca::all();

        
        $producto=producto::findOrFail($id);
        return view('producto.edit',compact('producto'), $marca);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'nombreProducto'=>'required|string',
            'costo'=>'required|string',
            'precio'=>'required|string',
            'cantidad'=>'required|string',
            //'Foto'=>"required|image|mimes:jpeg,png|max:600",
            //'idMarcaFK'=>'required|unique|max:20',
        ];
        $this->validate($request,$campos);
        
        $datosProducto=request()->except('_token','_method');
        if($request->hasFile('Foto')){
            $datosProducto['Foto']=$request->file('Foto')->Store('uploads','public');
        }
        producto::where('id','=',$id)->update($datosProducto);
        
        //return view('Marca.edit',compact('marca'));
       
        return redirect('producto/')->with('msn','producto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //    DB::table('productos')->where('id','=',$id)->delete();

        $producto = producto::findOrFail($id);
        if(Storage::delete('public/'.$producto -> Foto)){
            producto::destroy($id);
        }

        return redirect('producto')->with('msn','producto eliminada exitosamente');
    }
}
