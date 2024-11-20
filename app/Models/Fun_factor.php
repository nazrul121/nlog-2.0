<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fun_factor extends Model
{
    protected $guarded = [];

    // factors of fun_factor with id
    function fun_factors($id){
    	return Fun_factor_field::where('fun_factor_id',$id)->get();
    }


    // relation 
    function fun_factor_fields(){
    	return $this->hasMany(Fun_factor_field::class);
    }

    function main_menu(){
    	return $this->belongsTo(Main_menu::class);
    }
}
