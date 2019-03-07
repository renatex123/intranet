<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('registro_id');
            $table->boolean('estado');
            $table->timestamps();
            $table->foreign('registro_id')->references('id')->on('registros')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('asistencias');
    }

}
