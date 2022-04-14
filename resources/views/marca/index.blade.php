
@extends('layouts.index')
@section('content')
<header>
<script src="https://kit.fontawesome.com/4a02ae2b25.js" crossorigin="anonymous"></script>
      
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.css">

<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.css">

<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
 
<script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>



</header>
<body>
<div class="container">
   
<a class="btn btn-dark btn-sm" href="{{url('/marca/create')}}"><i class="fas fa-user-edit"> Agregar Marca</i></a>

<button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa fa-plus-square-o"> Agregar Marca Modal</i>
    </button>
</div>
<div class="container-sm text-center">
   
    <h3 class="text-center font-weight-bold">Modulo Marca</h3><br>
    <table class="table table-bordered table-striped table-hover table-light" id="datat">
        <thead class="thead-dark">
        
            <tr class="thead-dark">
                <th>#</th>
                <th>Nombre Marca</th>
                <th>Descripcion</th>
                <th>Foto</th>
                <th>Aciones </th>
            </tr>
        </thead>
        <tbody> 
            @foreach($marca as $marca)
            <tr>
                <td>{{$marca->id}}</td>
                <td>{{$marca->nombreMarca}}</td>
                <td>{{$marca->descripcion}}</td>
                <td>
                    <img src="storage/{{$marca->foto}}" alt="imagen no encontrada" class="img-fluid" width="180xp">
                </td>
                <td>   
                 <form action="{{url('/marca/'.$marca->id)}}" method="POST" id="id" name="id">      
                    @csrf 
                    {{method_field('DELETE')}}  
                    <!--  Vista editar
                     -->
                    <a class="btn btn-warning btn-sm" href="{{url('/marca/'.$marca->id.'/edit')}}" role="button"><i class="fas fa-user-edit"></i></a>
                   
                    <button type="button" class="btn btn-success btn-sm" href="{{url('/marca/'.$marca->id)}}" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                         <i class="fa fa-pencil-square-o"></i>
                      </button>
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Desea eliminar el registro?')" value="Borrar" > <i class="fa fa-trash"></i> </button>
                   
                 </form>
                </td>
               
            </tr>
            @endforeach
            @if(Session::has('msn'))
             <div class="alert alert-primary" role="alert">
                <strong>
                    {{Session::get('msn')}}
                </strong>
            </div>
            @endif
        </tbody>
    </table>
</div>
</body>


 <!-- Modal Agregar -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Marca</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
     
        <div class="modal-body">
          
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

  
 <!-- Modal Editar -->
 <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Marca</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        @include('marca.form')
                    <form action="{{url('/marca/'.$marca->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH')}}

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" >Nombre: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{$marca->nombreMarca}}" id="nombreMarca" name="nombreMarca" id="nombre"><br>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="descripcion">descripcion: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text"   value="{{$marca->descripcion}}" name="descripcion" id="descripcion"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="foto">Subir foto Marca:  </label>
                            <div class="col-md-6">
                            {{$marca->foto}}
                                <input class="form-control" type="file"  name="foto" id="foto"><br>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input class="btn btn-primary" type="submit" value="Enviar" >
                                <input class="btn btn-primary" type="button" name="Inicio" onclick="location.href='{{url('/marca/')}}'" value="Volver"><br>
                            </div>
                        </div>
                      

                    </form>
        </div>
        
      </div>
    </div>
  </div>


  <script>

var myTable = document.querySelector("#datat");
var dataTable = new DataTable("#datat", {
    perPage:5,
    labels: {
        placeholder: "Buscar",
        perPage: "{select} Registros por página",
        noRows: "No se encontraron registros",
        info: "Mostrando {start} al {end} de {rows} registros",
    }

});

</script>



@endsection