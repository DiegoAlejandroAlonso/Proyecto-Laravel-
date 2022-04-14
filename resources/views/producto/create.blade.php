@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="css/green.css" rel="stylesheet">
    <link href="green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link href="bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="css/jqvmap.min.css" rel="stylesheet"/>
    <link href="jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="css/daterangepicker.css" rel="stylesheet">
    <link href="daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
    <link href="custom.min.css" rel="stylesheet">



<br>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="card">  
          <div class="card-header text-center">Registro Producto</div>
              <div class="card-body">
                    <form action="{{url('/producto')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('producto.form')

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="nombreProducto">Nombre del producto: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="nombreProducto" id="nombreProducto"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="costo">Costo del producto: $</label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="costo" id="costo"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="precio">Precio del producto: $</label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="precio" id="precio"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="cantidad">Cantidad:  </label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="cantidad" id="cantidad"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="Foto">Subir foto producto:  </label>
                            <div class="col-md-6">
                                <input class="form-control" type="file" name="Foto" id="Foto"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="idMarcaFK">Marca:  </label>
                                <div class="col-md-6">
                                <select  class="form-control" value="{{isset($producto->idMarcaFK)?$producto->idMarcaFK:' '}}" name="idMarcaFK" id="idMarcaFK"  required autofocus>
                                    <option selected disabled readonly>Seleccione la marca</option>
                                    @foreach ($marca as $marca)
                                    <option value="{{$marca['id']}}">{{$marca['nombreMarca']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                 <input class="btn btn-primary" type="button" name="Inicio" onclick="location.href='{{url('/producto/')}}'" value="Volver">
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