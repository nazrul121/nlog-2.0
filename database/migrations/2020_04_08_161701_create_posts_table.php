<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_menu_id')->nullable();
            $table->unsignedBigInteger('sub_menu_id')->nullable();
            $table->string('title');
            $table->string('photo')->nullable();
            $table->longText('description');
            $table->enum('status',['1','0'])->default('1');
            $table->enum('related_post',['1','0'])->default('1');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

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
        Schema::dropIfExists('posts');
    }
}
