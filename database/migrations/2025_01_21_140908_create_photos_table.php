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
        Schema::create('photos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
