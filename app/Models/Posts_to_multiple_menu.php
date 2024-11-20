<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts_to_multiple_menu extends Model
{
    protected $guarded = [];

    // relation 
    function main_menu(){
    	return $this->belongsTo(Main_menu::class);
    }
    function sub_menu(){
    	return $this->belongsTo(Sub_menu::class);
    }
    function post(){
    	return $this->belongsTo(Post::class);
    }
}
