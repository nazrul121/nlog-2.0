<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Main_menu extends Model
{
    protected $guarded = [];

    //for slug routing 
    public function getRouteKeyName()
    {
        return 'title';
    }

    // relation 
    function sub_menus(){
    	return $this->hasMany(Sub_menu::class);
    }

    function posts(){
    	return $this->hasMany(Post::class);
    }

    function sliders(){
        return $this->hasMany(Slider::class);
    }

    function forms(){
        return $this->hasMany(Form::class);
    }

    function fun_factors(){
        return $this->belongsTo(FunFactor::class);
    }

    // relation 
    function latest_post_menus(){
        return $this->hasMany(Latest_post_menu::class);
    }
}
