<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('carrera_id');
            $table->unsignedInteger('curso_id');
            $table->unsignedInteger('ciclo_id');
            $table->unsignedInteger('periodo_id');
            $table->unsignedInteger('user_id');
            $table->string('nota1', 4);
            $table->string('nota2', 4);
            $table->string('nota3', 4);
            $table->string('nota4', 4);
            $table->string('nota5', 4);
            $table->string('nota6', 4);
            $table->string('nota7', 4);
            $table->string('nota8', 4);
            $table->boolean('estado_nota');
            $table->boolean('estado_periodo');
            $table->timestamps();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('ciclo_id')->references('id')->on('ciclos')->onDelete('cascade');
            $table->foreign('periodo_id')->references('id')->on('periodos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('notas');
    }

}
