<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $datos['marca']=Marca::paginate(5);
        $datoM['marca']=Marca::paginate(10);
        
        return view('marca.index',$datoM);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca.create');
        
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
            'nombreMarca'=>'required|string|max:30',
            'descripcion'=>'required|string|max:100',
            'foto'=>"required|image|mimes:jpeg,png|max:3000"
        ];
        $this->validate($request,$campos);



        
        $datosMarca=request()->except('_token','Enviar');
        if($request->hasFile('foto')){
            $datosMarca['foto']=$request->file('foto')->Store('uploads','public');
        }
        Marca::insert($datosMarca);
        //return response()->json($datosMarca);
        return redirect('marca/')->with('msn','marca agregada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        $marca=Marca::findOrFail($id);
        return view('marca.edit',compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'nombreMarca'=>'required|string|max:30',
            'descripcion'=>'required|string|max:100',
            //'foto'=>"required|image|mimes:jpeg,png|max:600"
        ];
        $this->validate($request,$campos);

        $datosMarca=request()->except('_token','_method');
        if($request->hasFile('foto')){
            $datosMarca['foto']=$request->file('foto')->Store('uploads','public');
        }
        Marca::where('id','=',$id)->update($datosMarca);
        
        //return view('Marca.edit',compact('marca'));
       
        
        return redirect('marca/')->with('msn','marca actualizada exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // DB::table('marcas')->where('id','=',$id)->delete();

        
        $marca = Marca::findOrFail($id);
        if(Storage::delete('public/'.$marca -> foto)){
            Marca::destroy($id);
        }


        return redirect('marca')->with('msn','marca eliminada exitosamente');
    }
}
