<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('graduation_year')->nullable();
            $table->string('occupation')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->text('story')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('published')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
