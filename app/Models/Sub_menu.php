<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sub_menu extends Model
{
    protected $guarded = [];
    
    // slug
    function path(){
    	return url("/page/{$this->id}-".Str::slug($this->title));
    }

    // main menu id wise sub-menus
    function sub_menus($id){
    	return Sub_menu::where('main_menu_id',$id)->where('status','1')->get();
    }

    // all sub-menus
    function sub_menu(){
        return Sub_menu::all();
    }


    function sub_menu_name($id){
        return Sub_menu::where('id',$id)->first();
    }


    // relation 
    function main_menu(){
    	return $this->belongsTo(Main_menu::class);
    }

    function posts(){
        return $this->hasMany(Post::class);
    }
}
