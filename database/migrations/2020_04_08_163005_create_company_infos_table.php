<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Company_info;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('open_time');
            $table->string('website');
            $table->string('off_day');
            $table->string('logo');
            $table->string('favicon');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Company_info::create([
            'name'=>'Zero infosys',
            'email'=>'info@zeroinfosys.com',
            'phone'=>'+8801749015457',
            'address'=>'New market, Dhaka',
            'open_time'=>'9.00am to 5.00pm',
            'website'=>'http://www.zeroinfosys.com',
            'off_day'=>'Friday',
            'logo'=>'images/logo.png',
            'favicon'=>'images/favicon.png',
            'user_id'=>'1'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_infos');
    }
}
