<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemon_tcg_marketplace', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_url');
            $table->integer('quantity');
            $table->integer('price');
            $table->bigInteger('user_id')->unsigned();

            //to prevent records overlapped
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_tcg_marketplace');
    }
};
