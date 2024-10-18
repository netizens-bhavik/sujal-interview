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
        Schema::create('joke_ratings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('joke_id');
            $table->bigInteger('user_id');
            $table->tinyInteger('rating')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joke_ratings');
    }
};
