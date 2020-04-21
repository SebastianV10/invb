<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('serie'); 
            $table->string('descripcion'); 
            $table->integer('estado'); 
            $table->integer('tipo_marca_id')->unsigned();
            $table->integer('salon_id')->unsigned();
            $table->integer('tipo_equipo_id')->unsigned();
            $table->integer('user_id')->unsigned();            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tipo_equipo_id')->references('id')->on('tipo_equipos');
            $table->foreign('salon_id')->references('id')->on('salons');            
            $table->foreign('tipo_marca_id')->references('id')->on('tipo_marcas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
        Schema::table('equipos',function(Blueprint $table){
          $table->dropForeign('equipos_user_id_foreign');
          $table->dropForeign('equipos_tipo_equipo_id_foreign');
          $table->dropForeign('equipos_salon_id_foreign');
          $table->dropForeign('equipos_tipo_marca_id_foreign'); 
        });
    }
}
