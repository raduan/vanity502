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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->string('Marca')->nullable();
            $table->string('Modelo')->nullable();
            $table->integer('Descuento')->nullable();
            $table->decimal('Precio', 9, 2);
            $table->integer('Existencias')->nullable();
            $table->foreignId('categoria_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('Foto')->nullable();
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
        Schema::dropIfExists('productos');
    }
};
