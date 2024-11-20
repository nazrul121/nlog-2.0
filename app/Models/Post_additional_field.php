<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_additional_field extends Model
{
    protected $guarded = [];

    // relation
    function post_additional_info(){
    	return $this->hasMany(Post_additional_info::class);
    }
}
