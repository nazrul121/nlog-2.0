<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_menu_id')->nullable();
            $table->string('title');
            $table->string('icon')->nullable();
            $table->text('short_description')->nullable();
            $table->enum('page_post_type',['list','descriptive']);
            $table->integer('order_by')->default('0');
            $table->enum('status',['1','0'])->default('1');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('sub_menus');
    }
}
