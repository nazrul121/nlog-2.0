<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_slider', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->unsignedBigInteger('main_menu_id')->nullable();
            $table->unsignedBigInteger('sub_menu_id')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->foreign('partner_id')->references('id')->on('partners');
            $table->foreign('main_menu_id')->references('id')->on('main_menus');
            $table->foreign('sub_menu_id')->references('id')->on('sub_menus');
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
        Schema::dropIfExists('partner_slider');
    }
}
