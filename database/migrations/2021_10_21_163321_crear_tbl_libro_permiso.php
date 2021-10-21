<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTblLibroPermiso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_permiso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_libroprestamo_usuario')->on('usuario')->references('id')->onUpdate('restrict')->onDelete('restrict');
            $table->unsignedBigInteger('libro_id');
            $table->foreign('libro_id','fk_libroprestamo_libroid')->on('libro')->references('id')->onUpdate('restrict')->onDelete('restrict');
            $table->date('fecha_prestamo');
            $table->string('prestado_a',100);
            $table->boolean('estado');
            $table->date('fecha_devolucion')->nullable();
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
        Schema::dropIfExists('libro_permiso');
    }
}
