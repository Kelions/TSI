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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_usuario');
            $table->string('apellido_usuario');
            $table->string('rut',10)->unique();
            $table->string('especialidad');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('cel',15)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            //estado no existe
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
