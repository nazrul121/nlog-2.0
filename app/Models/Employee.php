<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    // relation 
    function employee_type(){
        return $this->belongsTo(Employee_type::class);
    }

    function employee_sliders(){
    	return $this->hasMany(Employee_slider::class);
    }

}
