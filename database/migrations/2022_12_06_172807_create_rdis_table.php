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
        Schema::create('rdis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_proyect')
                ->constrained('proyects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            //$table->string('name_proyect');
            //$table->string('id_sender');
            //$table->string('id_recipient');

            $table->string('name_sender');
            $table->string('name_recipient');
            $table->text('subject'); //tema
            $table->text('specialization');
            $table->text('content');
            $table->char('status',1);

            $table->text('respuesta')->default('A la espera');
            //$table->string('path')->nulleable();//img
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
        Schema::dropIfExists('rdis');
    }
};
