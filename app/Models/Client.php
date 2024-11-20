<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client_slider;
class Client extends Model{

    protected $guarded = [];

    function slider($type, $menu_id){
    	if($type=='main_menu'){
    		return Client_slider::where('main_menu_id', $menu_id)->get();
    	}else{
    		return Client_slider::where('sub_menu_id', $menu_id)->get();
    	}
    }

    // relation 
    function client_sliders(){
    	return $this->hasMany(Client_slider::class);
    }

}
