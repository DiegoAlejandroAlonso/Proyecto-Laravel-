@extends('layouts.app')
@section('content')

<br>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="card">  
          <div class="card-header text-center">Registro venta</div>
              <div class="card-body">
              @include('producto.form')
              <form action="{{url('/venta')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="descripcion">descripcion: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="descripcion" id="descripcion"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="idProductoFK">Producto:  </label>
                                <div class="col-md-6">
                                <select  class="form-control" value="{{isset($venta->idProductoFK)?$venta->idProductoFK:' '}}" name="idProductoFK" id="idProductoFK"  required autofocus>
                                    <option selected disabled readonly>Seleccione el producto</option>
                                    @foreach ($producto as $producto)
                                    <option value="{{$producto['id']}}">{{$producto['nombreProducto']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       

                        

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="idUsuarioFK">Usuario:  </label>
                                <div class="col-md-6">
                                <select  class="form-control" value="{{isset($venta->idUsuarioFK)?$venta->idUsuarioFK:' '}}" name="idUsuarioFK" id="idUsuarioFK"  required autofocus>
                                    <option selected disabled readonly>Seleccione el usuario:</option>
                                    @foreach ($usuario as $usuario)
                                    <option value="{{$usuario['id']}}">{{$usuario['nombreUsuario']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                 <input class="btn btn-primary" type="button" name="Inicio" onclick="location.href='{{url('/venta/')}}'" value="Volver">
                                <input class="btn btn-primary" type="submit" name="Enviar">
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