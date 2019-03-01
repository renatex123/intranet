<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('carrera_id');
            $table->string('nombre', 50);
            $table->string('descripcion', 255);
            $table->timestamps();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('cursos');
    }

}
