<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('ru_name');
            $table->string('arm_name');
            $table->string('en_name');

            $table->string('ru_title');
            $table->string('arm_title');
            $table->string('en_title');

            $table->string('ru_description')->nullable();
            $table->string('arm_description')->nullable();
            $table->string('en_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
