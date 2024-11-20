<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slider_type_id')->nullable();
            $table->string('clientOrPartner')->default('client');
            $table->unsignedBigInteger('main_menu_id')->nullable();
            $table->unsignedBigInteger('sub_menu_id')->nullable();
            $table->string('title');
            $table->string('photo')->nullable();
            $table->longText('description');
             $table->enum('status',['1','0'])->default('1');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('slider_type_id')->references('id')->on('slider_types');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sub_menu_id')->references('id')->on('sub_menus');
            $table->foreign('main_menu_id')->references('id')->on('main_menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
