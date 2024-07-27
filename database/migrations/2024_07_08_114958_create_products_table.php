<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('title_ru');
                $table->string('title_en');
                $table->string('title_tk');
                $table->string('image')->nullable();
                $table->integer('order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->decimal('price', 10, 2);
                $table->unsignedBigInteger('category_id');
                $table->unsignedBigInteger('brand_id');
                $table->timestamps();

                $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
                $table->foreign('brand_id')->references('id')->on('product_brands')->onDelete('cascade');
            });
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
