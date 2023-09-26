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
            $table->string('product_name');
            $table->integer('product_quantity')->default('0');
            $table->decimal('product_price', 10, 2);
            $table->string('product_image')->default('1');
            $table->integer('product_rating')->default('1');
            $table->integer('product_discount')->default('0');
            $table->integer('categ_id');
            $table->text('product_description');
            $table->integer('product_status')->default('1');
            $table->integer('product_action')->default('0');
            $table->integer('product_custo');
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
