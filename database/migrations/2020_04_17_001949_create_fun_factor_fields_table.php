<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunFactorFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fun_factor_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fun_factor_id')->nullable();
            $table->string('icon',50)->nullable();
            $table->string('field_name',150);
            $table->string('field_value',150);
            $table->enum('status',['1','0'])->default('1');
            $table->timestamps();
            
            $table->foreign('fun_factor_id')->references('id')->on('fun_factors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fun_factor_fields');
    }
}
