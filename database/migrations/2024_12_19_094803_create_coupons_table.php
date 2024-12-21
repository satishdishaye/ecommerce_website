<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID
            $table->string('code')->unique();  // Coupon code (unique)
            $table->decimal('discount', 8, 2);  // Discount amount or percentage
            $table->enum('type', ['percentage', 'fixed']);  // Type of discount (percentage or fixed)
            $table->dateTime('expires_at')->nullable();  // Expiry date of the coupon (nullable)
            $table->integer('usage_limit')->default(1);  // Maximum times the coupon can be used (default 1)
            $table->integer('usage_count')->default(0);  // Number of times the coupon has been used
            $table->boolean('is_active')->default(true);  // If the coupon is active
            $table->timestamps();  // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
