<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $guarded = [];

    // slug
    function path(){
    	return url("/post/{$this->id}-".Str::slug($this->title));
    }

    // relation 
    function main_menu(){
    	return $this->belongsTo(Main_menu::class);
    }

    function sub_menu(){
        return $this->belongsTo(Sub_menu::class);
    }

    function post_additional_infos(){
        return $this->hasMany(Post_additional_info::class);
    }

    function user(){
    	return $this->belongsTo(User::class);
    }
}
