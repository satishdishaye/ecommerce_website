<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Auto increment ID for each order
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key for the user who placed the order
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('address');
            $table->string('address_line_2')->nullable(); // Apartment/Suite (optional)
            $table->string('city');
            $table->string('state');
            $table->string('postcode');
            $table->string('phone');
            $table->string('email');
            $table->boolean('is_account_created')->default(false); // Account creation flag
            $table->string('password')->nullable(); // Account password (if applicable)
            $table->boolean('is_shipping_address_different')->default(false); // Shipping address different flag
            $table->text('order_notes')->nullable();
            $table->decimal('subtotal', 10, 2); // Subtotal of the order
            $table->decimal('total', 10, 2); // Total amount including shipping/taxes
            $table->string('payment_method'); // E.g., 'Check Payment', 'Paypal'
            $table->enum('status', ['pending', 'completed', 'cancelled', 'failed'])->default('pending'); // Order status
            $table->timestamps(); // created_at and updated_at columns

            // Add foreign key constraint to user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
