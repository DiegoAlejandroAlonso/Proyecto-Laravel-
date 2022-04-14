@extends('layouts.app')
@section('content')

<br>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="card">  
          <div class="card-header text-center">Editar Producto</div>
              <div class="card-body">
              @include('producto.form')
                    <form action="{{url('/producto/'.$producto->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH')}}
                       

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="nombreProducto">Nombre del producto: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{$producto->nombreProducto}}" name="nombreProducto" id="nombreProducto"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="costo">Costo del producto: $</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{$producto->costo}}" name="costo" id="costo"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="precio">Precio del producto: $</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{$producto->precio}}" name="precio" id="precio"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="cantidad">Cantidad:  </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{$producto->cantidad}}" name="cantidad" id="cantidad"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="Foto">Subir foto producto:  </label>
                            <div class="col-md-6">
                            {{$producto->Foto}}
                                <input class="form-control" type="file" name="Foto" id="Foto"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="idMarcaFK">Marca:  </label>
                                <div class="col-md-6">
                                <select  class="form-control" value="{{isset($producto->idMarcaFK)?$producto->idMarcaFK:' '}}" name="idMarcaFK" id="idMarcaFK"  required autofocus>
                                    <option selected disabled readonly>{{$producto->marca->nombreMarca}}</option>
                                    @foreach ($marca as $marca)
                                    <option value="{{$marca['id']}}">{{$marca['nombreMarca']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                 <input class="btn btn-primary" type="button" name="Inicio" onclick="location.href='{{url('/producto/')}}'" value="Volver">
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