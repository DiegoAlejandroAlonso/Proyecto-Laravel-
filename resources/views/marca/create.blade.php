@extends('layouts.app')
@section('content')

<br>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="card">  
          <div class="card-header text-center">Registro Marca</div>
              <div class="card-body">

              @include('marca.form')
                    <form action="{{url('/marca')}}" method="post" enctype="multipart/form-data">
                        @csrf
                         

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-form-label text-md-end" for="nombreMarca">Nombre: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="nombreMarca" id="nombre" Requerid ><br>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-form-label text-md-end" for="descripcion">descripcion: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="descripcion" id="descripcion" Requerid><br>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-4 col-form-label text-md-end" for="foto">Subir foto Marca:  </label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="file" name="foto" id="foto" Requerid><br>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <input class="btn btn-primary" type="submit" name="Enviar">
                                            <input class="btn btn-primary" type="button" name="Inicio" onclick="location.href='{{url('/marca/')}}'" value="Volver"><br>
                                        </div>
                                    </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection