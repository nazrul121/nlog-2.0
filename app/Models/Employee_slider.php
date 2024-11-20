<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee_slider extends Model
{
    protected $guarded = [];

    // check is an employee exist in employee slider 
    function is_emp_in_slider($mployee_id, $menu, $id){
    	if ($menu=='main_menu') {
           return Employee_slider::where('main_menu_id',$id)->where('employee_id',$mployee_id)->count();
        }else{
            return Employee_slider::where('sub_menu_id',$id)->where('employee_id',$mployee_id)->count();
        }
    }

    //employee slider 
    function employee_slider($type,$id){
        if ($type=='main_menu') {
           return Employee_slider::where('main_menu_id',$id)->get();
        }else{
            return Employee_slider::where('sub_menu_id',$id)->get();
        }

    }


    // relation 
    function employee(){
    	return $this->belongsTo(Employee::class);
    }

}
