<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('type',100)->unique();
            $table->string('value')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
        });

        $data = [
            'show-greetings'=>'yes',
            'show-company-info'=>null,
            'home-post-multiple-menu-number'=>'6',
            'home-post-multiple-title'=>null,

            'home-post-single-title'=>'single menu post title goes here',
            'home-post-single-menu-number'=>'6',
            'home-post-single-menu'=>null,
            
            'slider-post-number'=>'3',
            'show-employee-info'=>null,
            'design'=>'design1'
        ];
        foreach ($data as $key => $value) {
            $comments = [
                'greeting shows at home. Yes/no',
                'which page is showing company info, page names',
                'how many post from multiple menu at home. pagi-number',
                'title of multiple post at home',
                'single menu post at home, title',
                'how many post from a single menu at home. pagi-number',
                'how many slider item will show?',
                'page names, when company info will show'
            ];

            Setting::create([
                'type'=>$key, 'value'=>$value,
                //'comment'=>$comments[$key]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
