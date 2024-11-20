<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Slider_type;
class CreateSliderTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_types', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('description');
            $table->timestamps();
        });

        $data = ['Main Content Slider'=>'The sliders those include main contents and generaly shows at the Home page or at the top of a page',
            'Logo Slider'=>'The sliders those normally shows client logos',
            'Employee Slider'=>'Some employee list will be there'];
        foreach ($data as $key => $value) {
            Slider_type::create(['title'=>$key,'description'=>$value]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_types');
    }
}
