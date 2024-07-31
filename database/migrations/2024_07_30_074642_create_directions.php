<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('directions_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('title_tk');
            $table->text('description_ru');
            $table->text('description_en');
            $table->text('description_tk');
            $table->string('main_image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('ordering');
            $table->timestamps();
        });

        Schema::create('directions_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('directions_categories')->onDelete('cascade');
            $table->string('poster_img')->nullable();
            $table->string('partner_logo')->nullable();
            $table->string('link')->nullable();
            $table->json('images')->nullable();
            $table->json('videos')->nullable();
            $table->text('description_ru');
            $table->text('description_en');
            $table->text('description_tk');
            $table->boolean('is_active')->default(true);
            $table->integer('ordering');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('directions_items');
        Schema::dropIfExists('directions_categories');
    }
};
