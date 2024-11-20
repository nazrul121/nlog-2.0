<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form_detail extends Model
{
    protected $guarded = [];


    // relation 
    function form(){
        return $this->belongsTo(Form::class);
    }
}
					