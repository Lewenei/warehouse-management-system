<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade'); // Assuming a 'customers' table exists
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');   // Assuming a 'products' table exists
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->date('order_date');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
