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
            $table->bigInteger('product_category_id');
            $table->string('name')->nullable();
            $table->string('unit', 100)->nullable();
            $table->integer('minimal_stock')->default(0);
            $table->integer('maximal_stock')->default(0);
            $table->integer('stock')->default(0);
            $table->integer('selling_price')->default(0);
            $table->integer('purchase_price')->default(0);
            $table->timestamps();
            $table->softDeletes();
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
