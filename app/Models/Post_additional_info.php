<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_additional_info extends Model
{
    protected $guarded = [];

    function is_field_exist($post_id,$additonal_id){
    	return Post_additional_info::where('post_id',$post_id)->where('post_additional_field_id',$additonal_id)->first();
    }
    // relation 
    function post(){
    	return $this->belongsTo(Post::class);
    }

    function post_additional_field(){
    	return $this->belongsTo(Post_additional_field::class);
    }
}
