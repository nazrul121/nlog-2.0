<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee_type extends Model
{
    protected $guarded = [];

    // relation 
    function employees(){
        return $this->hasMany(Employee::class);
    }
}
