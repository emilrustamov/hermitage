<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('title_ru');
            $table->text('description_ru');
            $table->string('title_en');
            $table->text('description_en');
            $table->string('title_tk');
            $table->text('description_tk');
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->date('year')->default(now());
            $table->string('video')->nullable();
            $table->string('plan_image')->nullable();
            $table->string('location_ru')->nullable();
            $table->string('location_en')->nullable();
            $table->string('location_tk')->nullable();
            $table->integer('area')->nullable();
            $table->string('designer_ru')->nullable();
            $table->string('designer_en')->nullable();
            $table->string('designer_tk')->nullable();
            $table->string('architect_ru')->nullable();
            $table->string('architect_en')->nullable();
            $table->string('architect_tk')->nullable();
            $table->json('photos')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contracts');
    }
};
