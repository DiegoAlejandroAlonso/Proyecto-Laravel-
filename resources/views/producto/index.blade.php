@extends('layouts.index')
@section('content')
<header>
<script src="https://kit.fontawesome.com/4a02ae2b25.js" crossorigin="anonymous"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.css">

<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
 
<script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

</header>
<body>
<div class="container">
  
<a class="btn btn-dark btn-sm" href="{{url('/producto/create')}}"><i class="fas fa-user-edit"> Agregar Producto</i></a>

<button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa fa-plus-square-o"> Agregar Producto modal</i>
    </button>
</div>
<div class="container-sm text-center">
   
    <h3 class="text-center font-weight-bold">Modulo Producto</h3><br>
    <table class="table table-bordered  table-hover table-light display" id="datat" >
        <thead class="thead-dark table-dark">
        
            <tr class="thead-dark text-center">
                <th>#</th>
                <th>Nombre Producto</th>
                <th>Costo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Foto</th>
               
                <th>Nombre marca</th>
                
                
                <th>Aciones </th>
            </tr>
        </thead>
        <tbody> 
       
            @foreach($producto as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto->nombreProducto}}</td>
                <td>{{$producto->costo}}</td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->cantidad}}</td>
                <td>
                    <img src="storage/{{$producto->Foto}}" alt="imagen no encontrada" class="img-fluid" width="180xp">
                </td>
                
                <td>{{$producto->marca->nombreMarca}}</td>
                
                <td>   
                 <form id="deletebtn" method="POST" action="{{url('/producto/'.$producto->id)}}" class="" name="">      
                    @csrf 
                    @method('DELETE')
                    
                    <a class="btn btn-warning btn-sm" href="{{url('/producto/'.$producto->id.'/edit')}}" role="button"><i class="fas fa-user-edit"></i></a>
                    
                    <button type="button" class="btn btn-success btn-sm" href="{{url('/producto/'.$producto->id)}}" data-bs-toggle="modal" data-bs-target="#exampleModal2">
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
          <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        @include('producto.form')
        <form action="{{url('/producto')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        

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
                                <input class="form-control" type="number" name="idMarcaFK" id="idMarcaFK"><br>
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
                                <input class="form-control" type="text" value="{{$producto->idMarcaFK}}" name="idMarcaFK" id="idMarcaFK"><br>
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