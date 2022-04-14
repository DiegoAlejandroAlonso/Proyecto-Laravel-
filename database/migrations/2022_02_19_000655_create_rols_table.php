<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rols', function (Blueprint $table) {
            $table->bigIncrements('idRol');                       
            $table->string('nombreRol','30');            
            $table->timestamps();
        });
        {
            Schema::create('marcas', function (Blueprint $table) {
                $table->bigIncrements('idmarca');           
                $table->string('nombreMarca','30');            
                $table->string('descripcion','100');
                $table->timestamps();
            });
        }
        {
            Schema::create('usuarios', function (Blueprint $table) {
                $table->bigIncrements('idusuario');
                $table->string('emailUsuario','50');
                $table->string('password','30');
                $table->string('nombreUsuario','50');                
                $table->unsignedBigInteger('idRolFK');
                $table->foreign('idRolFK')->references('idRol')->on('rols'); 
                $table->string('estadoUsuario','10');
                $table->timestamps();
            });
        }
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('idProducto');            
            $table->string('nombreProducto','70');
            $table->double('costo');
            $table->double('precio');
            $table->integer('cantidad');
            $table->unsignedBigInteger('idMarcaFK');            
            $table->foreign('idMarcaFK')->references('idMarca')->on('marcas');
            $table->timestamps();
        });
    }
    {
        Schema::create('detalleVentas', function (Blueprint $table) {
            $table->bigIncrements('idDetalleVenta');
            $table->string('descripcion','100');            
            $table->unsignedBigInteger('idProductoFK');
            $table->foreign('idProductoFK')->references('idProducto')->on('productos');
            $table->unsignedBigInteger('idUsuarioFK');
            $table->foreign('idUsuarioFK')->references('idUsuario')->on('usuarios');             
            $table->timestamps();
        });
    }    
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rols');
        Schema::dropIfExists('marcas');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('productos');
        Schema::dropIfExists('detalleVentas');
    }
};
