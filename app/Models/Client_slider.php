<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_slider extends Model{

    protected $guarded = [];
    protected $table = 'client_slider';
    
    

    // check is an client exist in client slider 
    function is_client_in_slider($client_id, $menu, $id){
        if ($menu=='main_menu') {
           return Client_slider::where('main_menu_id',$id)->where('client_id',$client_id)->count();
        }else{
            return Client_slider::where('sub_menu_id',$id)->where('client_id',$client_id)->count();
        }
    }


    // relation 
    function client(){
    	return $this->belongsTo(Client::class);
    }

    function main_menu(){
    	return $this->belongsTo(Main_menu::class);
    }

    function sub_menu(){
    	return $this->belongsTo(Sub_menu::class);
    }

}
