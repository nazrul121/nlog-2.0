<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded = [];

    function slider($type, $menu_id){
    	if($type=='main_menu'){
    		return Partner_slider::where('main_menu_id', $menu_id)->get();
    	}else{
    		return Partner_slider::where('sub_menu_id', $menu_id)->get();
    	}
    }


    function partner_sliders(){
    	return $this->hasMany(Partner_slider::class);
    }
}
