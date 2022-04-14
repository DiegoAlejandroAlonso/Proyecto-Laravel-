@extends('layouts.app')
@section('content')

<br>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="card">  
          <div class="card-header text-center">Editar Rol</div>
              <div class="card-body">
              @include('producto.form')
              <form action="{{url('/rol/'.$rol->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH')}}
                        
                        <div class="row mb-3">    
                            <label class="col-md-4 col-form-label text-md-end" for="nombreRol">Nombre: </label>
                            <div class="col-md-6">
                                 <input class="form-control" type="text" value="{{$rol->nombreRol}}" name="nombreRol" id="nombreRol"><br>
                            </div>    
                         </div>
                         <div class="row mb-0">
                             <div class="col-md-8 offset-md-4">
                                 <input class="btn btn-primary" type="submit" value="Enviar"><br>
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