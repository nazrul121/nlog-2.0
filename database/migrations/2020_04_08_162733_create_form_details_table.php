<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id')->nullable();
            $table->string('label')->nullable();
            $table->string('field_type');
            $table->string('field_name');
            $table->string('placeholder')->nullable();
            $table->enum('is_required',['1','0'])->default('1');
            $table->string('options')->nullable();
            $table->string('option_values')->nullable();
            $table->string('width',10)->nullable();
            $table->integer('sort_by')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('form_id')->references('id')->on('forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_details');
    }
}
