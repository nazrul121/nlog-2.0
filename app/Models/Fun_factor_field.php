<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fun_factor_field extends Model
{
    protected $guarded = [];

    // fun_factor_id base fields 
    public function factor_fields($id='')
    {
    	$number = Fun_factor::where('id',$id)->pluck('display_number')->first();
        return Fun_factor_field::where('fun_factor_id',$id)->take($number)->get();
    }
    // relation 
    function fun_factor(){
    	return $this->belongsTo(Fun_factor::class);
    }
}
