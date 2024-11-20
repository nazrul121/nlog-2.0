<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGreetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('greetings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('photo')->nullable();
            $table->longText('description');
            $table->string('video_link');
            $table->string('bg_color')->nullable();
            $table->enum('status',['1','0'])->default('1');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('greetings');
    }
}
