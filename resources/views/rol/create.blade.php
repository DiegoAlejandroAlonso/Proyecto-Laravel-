@extends('layouts.app')
@section('content')

<br>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="card"> 
             <div class="card-header text-center">Registro Rol</div>
                <div class="card-body">
                @include('producto.form')
                    <form action="{{url('/rol')}}" method="post" enctype="multipart/form-data">
                            @csrf
                         <div class="row mb-3">    
                            <label class="col-md-4 col-form-label text-md-end" for="nombreRol">Nombre: </label>
                            <div class="col-md-6">
                                 <input class="form-control" type="text" name="nombreRol" id="nombre"><br>
                            </div>    
                         </div>
                         <div class="row mb-0">
                             <div class="col-md-8 offset-md-4">
                                 <input class="btn btn-primary" type="submit" name="Enviar"><br>
                             </div>   
                         </div>   
                    </form>
                <div>
        </div>
     </div>
 </div>



@endsection
