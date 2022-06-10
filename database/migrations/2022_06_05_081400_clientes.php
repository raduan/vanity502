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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('Nombres');
            $table->string('Apellidos');
            $table->integer('Genero');
            $table->string('Direccion');
            $table->string('Telefono')->unique();
            $table->string('email')->unique();
            $table->date('FechaNacimiento')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('ciudades_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('DPI')->unique();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->rememberToken();
            $table->string('Avatar')->nullable();
            $table->boolean('IsAdmin')->default(false);
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
        Schema::dropIfExists('clientes');
    }
};
