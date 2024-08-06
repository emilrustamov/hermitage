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
        Schema::table('blogs', function (Blueprint $table) {
            $table->longText('description_tk')->change();
        });
        Schema::table('blogs', function (Blueprint $table) {
            $table->longText('description_ru')->change();
        });
        Schema::table('blogs', function (Blueprint $table) {
            $table->longText('description_en')->change();
        });


        Schema::table('contracts', function (Blueprint $table) {
            $table->longText('description_tk')->change();
        });
        Schema::table('contracts', function (Blueprint $table) {
            $table->longText('description_ru')->change();
        });
        Schema::table('contracts', function (Blueprint $table) {
            $table->longText('description_en')->change();
        });


        Schema::table('directions_items', function (Blueprint $table) {
            $table->longText('description_tk')->change();
        });
        Schema::table('directions_items', function (Blueprint $table) {
            $table->longText('description_ru')->change();
        });
        Schema::table('directions_items', function (Blueprint $table) {
            $table->longText('description_en')->change();
        });

        Schema::table('directions_categories', function (Blueprint $table) {
            $table->longText('description_tk')->change();
        });
        Schema::table('directions_categories', function (Blueprint $table) {
            $table->longText('description_ru')->change();
        });
        Schema::table('directions_categories', function (Blueprint $table) {
            $table->longText('description_en')->change();
        });


       


        Schema::table('projects', function (Blueprint $table) {
            $table->longText('description_tk')->change();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->longText('description_ru')->change();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->longText('description_en')->change();
        });


        Schema::table('vacancies', function (Blueprint $table) {
            $table->longText('description_tk')->change();
        });
        Schema::table('vacancies', function (Blueprint $table) {
            $table->longText('description_ru')->change();
        });
        Schema::table('vacancies', function (Blueprint $table) {
            $table->longText('description_en')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('description_tk')->change();
        });
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('description_ru')->change();
        });
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('description_en')->change();
        });


        Schema::table('contracts', function (Blueprint $table) {
            $table->string('description_tk')->change();
        });
        Schema::table('contracts', function (Blueprint $table) {
            $table->string('description_ru')->change();
        });
        Schema::table('contracts', function (Blueprint $table) {
            $table->string('description_en')->change();
        });


        Schema::table('directions_items', function (Blueprint $table) {
            $table->string('description_tk')->change();
        });
        Schema::table('directions_items', function (Blueprint $table) {
            $table->string('description_ru')->change();
        });
        Schema::table('directions_items', function (Blueprint $table) {
            $table->string('description_en')->change();
        });

        Schema::table('directions_categories', function (Blueprint $table) {
            $table->string('description_tk')->change();
        });
        Schema::table('directions_categories', function (Blueprint $table) {
            $table->string('description_ru')->change();
        });
        Schema::table('directions_categories', function (Blueprint $table) {
            $table->string('description_en')->change();
        });


       


        Schema::table('projects', function (Blueprint $table) {
            $table->string('description_tk')->change();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->string('description_ru')->change();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->string('description_en')->change();
        });


        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('description_tk')->change();
        });
        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('description_ru')->change();
        });
        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('description_en')->change();
        });
    }
};
