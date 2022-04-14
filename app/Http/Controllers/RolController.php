<?php

namespace App\Http\Controllers;

use App\Models\rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['rol']=rol::paginate(5);
        return view('rol.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rol.create');
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
            'nombreRol'=>'required|string',
            
        ];

        $this->validate($request,$campos);

        $datosRol=request()->except('_token','Enviar');
        Rol ::insert($datosRol);
       
        return redirect('rol/')->with('msn','rol agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(rol $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $rol=rol::findOrFail($id);
        return view('rol.edit',compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombreRol'=>'required|string',
            
        ];
        $this->validate($request,$campos);
        
        $datosRol=request()->except('_token','_method');
        rol::where('id','=',$id)->update($datosRol);
        
        
       
        return redirect('rol/')->with('msn','rol actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('rols')->where('id','=',$id)->delete();
        return redirect('rol/')->with('msn','rol eliminado exitosamente');
    }
} 
