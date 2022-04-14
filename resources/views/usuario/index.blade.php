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
<body>
<div class="container">
  
<a class="btn btn-dark btn-sm" href="{{url('/usuario/create')}}"><i class="fas fa-user-edit"> Agregar Usuario</i></a>

<button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa fa-plus-square-o"> Agregar Usuario Modal</i>
    </button>
</div>
<div class="container-sm text-center">
   
    <h3 class="text-center font-weight-bold">Modulo Usuario</h3><br>
    <table class="table table-bordered  table-hover table-light" id="datat">
        <thead class="thead-dark table-dark">
        
            <tr class="thead-dark">
                <th>#</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Estado</th>
                
                <th>Aciones </th>
            </tr>
        </thead>
        <tbody> 
            @foreach($usuario as $usuario)
            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->emailUsuario}}</td>
                <td>{{$usuario->password}}</td>
                <td>{{$usuario->nombreUsuario}}</td>
                <td>{{$usuario->rol->nombreRol}}</td>
                <td>{{$usuario->estadoUsuario}}</td>
                
                <td>   
                 <form id="deletebtn" method="POST" action="{{url('/usuario/'.$usuario->id)}}" class="" name="">      
                    @csrf 
                    @method('DELETE')
                   
                    <a class="btn btn-warning btn-sm" href="{{url('/usuario/'.$usuario->id.'/edit')}}" role="button"><i class="fas fa-user-edit"></i></a>
                    
                    <button type="button" class="btn btn-success btn-sm" href="{{url('/usuario/'.$usuario->id)}}" data-bs-toggle="modal" data-bs-target="#exampleModal2">
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
          <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        @include('producto.form')
        <form action="{{url('/usuario')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        
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
                            <label class="col-md-4 col-form-label text-md-end" for="idRolFK">Rol: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="idRolFK" id="idRolFK" placeholder="1,2,3"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="estadoUsuario">Estado: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="estadoUsuario" id="estadoUsuario" placeholder="Activo o inactivo"><br>
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
          <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        @include('producto.form')
        <form action="{{url('/usuario/'.$usuario->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH')}}
                        

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="emailUsuario">Email: </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{$usuario->emailUsuario}}" name="emailUsuario" id="emailUsuario"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="password">Password: $</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{$usuario->password}}" name="password" id="password"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="nombreUsuario">Nombre: $</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{$usuario->nombreUsuario}}" name="nombreUsuario" id="nombreUsuario"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="idRolFK">Rol:  </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{$usuario->idRolFK}}" name="idRolFK" id="idRolFK"><br>
                            </div>
                        </div>
                       
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="estadoUsuario">Estado Usuario:  </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{$usuario->estadoUsuario}}" name="estadoUsuario" id="estadoUsuario"><br>
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
  -->

  <script src="sweetalert2.all.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script type="text/javascript">

  $(document).ready(function(){
    
        $('.servideletebtn').click(function(e){
            e.preventDefault();
            alert('hola');
        });

  });


/*
 <script>
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
¿

*/
  </script>
  

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

</body>



@endsection