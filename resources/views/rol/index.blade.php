@extends('layouts.index')
@section('content')
<header>
<script src="https://kit.fontawesome.com/4a02ae2b25.js" crossorigin="anonymous"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
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

<div class="container">
<a class="btn btn-dark btn-sm" href="{{url('/rol/create')}}"><i class="fas fa-user-edit"> Agregar Rol</i></a>
<button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa fa-plus-square-o"> Agregar Rol Modal</i>
    </button>
</div>

<div class="container-sm text-center">
    <h3 class="text-center font-weight-bold">Modulo Roles</h3><br>
    <table class="table table-bordered table-striped table-hover table-light" id="datat">
        <thead class="thead-dark">
        
            <tr class="thead-dark">
                <th>iD</th>
                <th>Nombre Rol</th>
                <th>Aciones </th>
            </tr>
        </thead>
        <tbody> 
            @foreach($rol as $rol)
            <tr>
                <td>{{$rol->id}}</td>
                <td>{{$rol->nombreRol}}</td>
                
                <td>
                <form action="{{url('/rol/'.$rol->id)}}" method="POST" id="id" name="idRol">      
                @csrf 
                 {{method_field('DELETE')}}
                 <a class="btn btn-warning btn-sm" href="{{url('/rol/'.$rol->id.'/edit')}}" role="button"><i class="fas fa-user-edit"></i></a>
                 <button type="button" class="btn btn-success btn-sm" href="{{url('/rol/'.$rol->id)}}" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                 
                    <i class="fa fa-pencil-square-o"></i>
                      </button>
                    <button class="btn btn-danger btn-sm  servideletebtn" type="submit" onclick="return confirm('Desea eliminar el registro?')"> <i class="fa fa-trash"></i></button>

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


 <!-- Modal Agregar -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Rol</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
        </div>
        
      </div>
    </div>
  </div>

  
 <!-- Modal Editar -->
 <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Rol</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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