<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fun_factors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_menu_id')->nullable();
            $table->unsignedBigInteger('sub_menu_id')->nullable();
            $table->string('background_photo')->nullable();
            $table->string('model_photo')->nullable();
            $table->integer('display_number')->default(4);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('sub_menu_id')->references('id')->on('sub_menus');
            $table->foreign('main_menu_id')->references('id')->on('main_menus');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fun_factors');
    }
}
