<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Main_menu;
class CreateMainMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_menus', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('icon')->nullable();
            $table->text('short_description')->nullable();
            $table->enum('page_post_type',['list','descriptive','single'])->default('list');
            $table->enum('status',['1','0'])->default('1');
            $table->integer('order_by')->default('0');
            $table->timestamps();
        });

        Main_menu::create(['title'=>'Home']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_menus');
    }
}
