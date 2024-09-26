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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the product
            $table->text('description')->nullable(); // Description of the product (optional)
            $table->integer('quantity'); // Quantity of the product in stock

            // Foreign key for product type
            $table->foreignId('product_type_id')
                ->constrained('product_types')
                ->onDelete('cascade');

            // Foreign key for warehouse location
            $table->foreignId('warehouse_location_id')
                ->constrained('warehouse_locations')
                ->onDelete('cascade');

            // Foreign key for supplier
            $table->foreignId('supplier_id')
                ->constrained('suppliers')
                ->onDelete('cascade');

            // Price, batch number, expiry date
            $table->decimal('price', 8, 2); // Price of the product
            $table->string('batch_number')->nullable(); // Batch number
            $table->date('expiry_date')->nullable(); // Expiry date

            // Foreign key for the user who created the product
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Timestamps for record creation and update
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
