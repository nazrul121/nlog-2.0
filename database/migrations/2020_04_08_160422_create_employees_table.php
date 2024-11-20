<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_type_id')->nullable();
            $table->string('position');
            $table->string('name');
            $table->string('sex',10);
            $table->string('mobile')->unique();
            $table->string('email')->unique();
            $table->float('salary')->nullable();
            $table->string('photo')->nullable();
            $table->text('address');
            $table->enum('status',['1','0'])->default('1');
            $table->timestamps();

            $table->foreign('employee_type_id')->references('id')->on('employee_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
