<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Provider\appServiceProvider;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->string('role', 20);
            $table->string('name', 30);
            $table->string('surname', 30);
            $table->string('email', 100)->unique();
            $table->string('password', 60);
            $table->string('nick', 20);
            $table->string('dni', 9);
            $table->string('clave_registro', 255);
            $table->string('foto', 255);
            $table->boolean('estado');
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
