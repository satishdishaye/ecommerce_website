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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cat_id')->unsigned(); // Corrected column type and added unsigned
            $table->string('product_name');
            $table->integer('price');
            $table->string('description');
            $table->string('status');
        
            // Foreign key constraint
            $table->foreign('cat_id')->references('id')->on('category')->onDelete('cascade'); 
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
