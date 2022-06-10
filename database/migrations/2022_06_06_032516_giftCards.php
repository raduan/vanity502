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
        Schema::create('giftCards', function (Blueprint $table) {
            $table->id();
            $table->decimal('Monto', 9, 2);
            $table->foreignId('clientes_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('CODE');
            $table->boolean('Porcentual')->default(false);
            $table->timestamp('reclaimed_at')->nullable();
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
        Schema::dropIfExists('giftCards');
    }
};
