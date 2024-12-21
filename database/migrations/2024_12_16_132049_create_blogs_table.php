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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->string('author'); 
            $table->date('published_at'); 
            $table->integer('comments_count')->default(0); 
            $table->text('content');
            $table->text('excerpt'); 
            $table->string('image'); 
            $table->string('author_image')->nullable();
            $table->json('categories');
            $table->json('tags'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
