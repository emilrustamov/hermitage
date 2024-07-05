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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->nullable();
            $table->string('company_name')->nullable();
            $table->string('contact')->nullable();
            $table->boolean('subscribe_to_blog')->default(false);
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('company_name');
            $table->dropColumn('contact');
            $table->dropColumn('subscribe_to_blog');
        });
    }
    
};
