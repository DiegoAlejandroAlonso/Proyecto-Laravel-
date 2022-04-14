@extends('layouts.app')
@section('content')

<br>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="card">  
          <div class="card-header text-center">Registro Usuario</div>
          @include('producto.form')
                <div class="card-body">
                    <form action="{{url('/usuario')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="emailUsuario">Email: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="email" name="emailUsuario" id="email"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="password">Password: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="paswwrod" name="password" id="password"><br>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="nombreUsuario">Nombre: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="nombreUsuario" id="nombre"><br>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="idRolFK">Rol:  </label>
                                <div class="col-md-6">
                                <select  class="form-control" value="{{isset($usuario->idRolFK)?$usuario->idRolFK:' '}}" name="idRolFK" id="idRolFK"  required autofocus>
                                    <option selected disabled readonly>Seleccione el rol</option>
                                    @foreach ($rol as $rol)
                                    <option value="{{$rol['id']}}">{{$rol['nombreRol']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="estadoUsuario">Estado:  </label>
                                <div class="col-md-6">
                                <select  class="form-control"  name="estadoUsuario" id="estadoUsuario" required autofocus>
                                    <option selected disabled readonly>Seleccione estado</option>
                                    
                                    <option name="estadoUsuario" id="estadoUsuario">Activo</option>
                                    <option name="estadoUsuario" id="estadoUsuario">Inactivo</option>
                                    
                                </select>
                            </div>
                        </div>
                       


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input class="btn btn-primary" type="submit" name="Enviar"><br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection