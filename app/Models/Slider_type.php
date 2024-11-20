<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider_type extends Model
{
    protected $guarded = [];

    function sliders(){
    	return $this->hasMany(Slider::class);
    }
}
