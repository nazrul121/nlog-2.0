<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = [];


    // relation 
    function main_menu(){
    	return $this->belongsTo(Main_menu::class);
    }

    function slider_type(){
    	return $this->belongsTo(Slider_type::class);
    }
}
