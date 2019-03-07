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
            $table->unsignedInteger('registro_id');
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
        Schema::dropIfExists('notas');
    }

}
