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
        Schema::create('products_buys', function (Blueprint $table) {
            $table->id();
            $table->integer('ptoducts_buy_ptoduct_id');
            $table->integer('ptoducts_buy_product_quantity');
            $table->decimal('ptoducts_buy_product_totalprice', 10, 2);
            $table->integer('ptoducts_buy_buy_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_buys');
    }
};
