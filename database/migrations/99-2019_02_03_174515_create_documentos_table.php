<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('carrera_id');
            $table->unsignedInteger('curso_id');
            $table->unsignedInteger('ciclo_id');
            $table->string('nombre', 150);
            $table->string('archivo', 255);
            $table->timestamps();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('ciclo_id')->references('id')->on('ciclos')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('documentos');
    }

}
