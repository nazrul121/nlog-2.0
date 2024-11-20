<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('role',['admin','moderator']);
            $table->string('name');
            $table->string('sex');
            $table->string('mobile');
            $table->string('photo')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('address');
            $table->enum('status',['1','0'])->default('1');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create(['role'=>'admin','name'=>'Nazrul Islam','sex'=>'male','mobile'=>'0749015457','photo'=>'images/male.jpg','email'=>'admin@email.com','password'=>Hash::make('123'),'address'=>'Savar, DHaka']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
