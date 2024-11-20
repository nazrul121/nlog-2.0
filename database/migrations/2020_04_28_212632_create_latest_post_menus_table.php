<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatestPostMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('latest_post_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_menu_id');
            $table->timestamps();

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
        Schema::dropIfExists('latest_post_menus');
    }
}
