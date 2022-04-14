<?php

namespace App\Http\Controllers;

use App\Models\rol;
use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datoU['usuario']=usuario::paginate(10);
        return view('usuario.index',$datoU);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol['rol']= rol::all();
        return view('usuario.create',$rol);
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
            'emailUsuario'=>'required|string|max:700',
            'password'=>'required|string|max:30',
            'nombreUsuario'=>'required|string|max:50',
           // 'idRolFK'=>'required|unique|max:20',
            'estadoUsuario'=>'required|string|max:10',
            
        ];
        $this->validate($request,$campos);

        $datosUsuario=request()->except('_token','Enviar');
        usuario ::insert($datosUsuario);
        
        //return response()->json($datosMarca);
        return redirect('usuario/')->with('msn','usuario agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol['rol']= rol::all();
        $usuario=usuario::findOrFail($id);
        return view('usuario.edit',compact('usuario'),$rol);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'emailUsuario'=>'required|string|max:700',
            'password'=>'required|string|max:30',
            'nombreUsuario'=>'required|string|',
            //'idRolFK'=>'required|unique|max:20',
            'estadoUsuario'=>'required|string|max:10',
            
        ];
        $this->validate($request,$campos);

        $datosUsuario=request()->except('_token','_method');
        
        usuario::where('id','=',$id)->update($datosUsuario);
        
        //return view('Marca.edit',compact('marca'));
       
        return redirect('usuario/')->with('msn','usuario actualizado exitosamente');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        DB::table('usuarios')->where('id','=',$id)->delete();
       
        return redirect('usuario/')->with('msn','usuario eliminado exitosamente');
    }
}
