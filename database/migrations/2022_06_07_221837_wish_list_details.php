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
        Schema::create('wishListDetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('producto_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('wishlist_id')->constrained('wishlist', 'id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('wishListDetails');
    }
};
