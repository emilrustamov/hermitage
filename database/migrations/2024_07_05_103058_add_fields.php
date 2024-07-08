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
    Schema::table('projects', function (Blueprint $table) {
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
    });
}

public function down()
{
    Schema::table('projects', function (Blueprint $table) {
        $table->dropColumn([
            'plan_image', 'location_ru', 'location_en', 'location_tk', 
            'area', 'designer_ru', 'designer_en', 'designer_tk', 
            'architect_ru', 'architect_en', 'architect_tk'
        ]);
    });
}

};
