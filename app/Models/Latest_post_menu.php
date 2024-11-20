<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Latest_post_menu extends Model
{
    protected $guarded = [];

    // relation 
    function main_menu(){
    	return $this->belongsTo(Main_menu::class);
    }
}
