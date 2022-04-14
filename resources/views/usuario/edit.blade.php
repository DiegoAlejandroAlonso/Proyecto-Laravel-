@extends('layouts.app')
@section('content')

<br>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="card">  
          <div class="card-header text-center">Editar Usuario</div>
              <div class="card-body">
              @include('producto.form')
              <form action="{{url('/usuario/'.$usuario->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH')}}
                        

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="emailUsuario">Correo: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{$usuario->emailUsuario}}" name="emailUsuario" id="emailUsuario"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="password">Contraseña: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{$usuario->password}}" name="password" id="password"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="nombreUsuario">Nombre: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{$usuario->nombreUsuario}}" name="nombreUsuario" id="nombreUsuario"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="idRolFK">Rol:  </label>
                                <div class="col-md-6">
                                <select  class="form-control" value="{{isset($usuario->idRolFK)?$usuario->idRolFK:' '}}" name="idRolFK" id="idRolFK"  required autofocus>
                                    <option selected disabled readonly>{{$usuario->rol->nombreRol}}</option>
                                    @foreach ($rol as $rol)
                                    <option value="{{$rol['id']}}">{{$rol['nombreRol']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="estadoUsuario">Estado:  </label>
                                <div class="col-md-6">
                                <select  class="form-control" value="{{$usuario->estadoUsuario}}"  name="estadoUsuario" id="estadoUsuario" required autofocus>
                                    <option value="{{$usuario->estadoUsuario}}" selected  >{{$usuario->estadoUsuario}}</option>
                                    
                                    <option name="estadoUsuario" id="estadoUsuario">Activo</option>
                                    <option name="estadoUsuario" id="estadoUsuario">Inactivo</option>
                                    
                                </select>
                            </div>
                        </div>

                        
                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                 <input class="btn btn-primary" type="button" name="Inicio" onclick="location.href='{{url('/usuario/')}}'" value="Volver">
                                <input class="btn btn-primary" type="submit" value="Enviar">
                            </div>
                        </div>
                      

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function (e){
        $('#foto').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#foto').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });

    
</script>

@endsection