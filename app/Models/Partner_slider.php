<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner_slider extends Model
{
    protected $guarded = [];
    protected $table="partner_slider";

    // check is an partner exist in client slider 
    function is_partner_in_slider($partner_id, $menu, $id){
        if ($menu=='main_menu') {
           return Partner_slider::where('main_menu_id',$id)->where('partner_id',$partner_id)->count();
        }else{
            return Partner_slider::where('sub_menu_id',$id)->where('partner_id',$partner_id)->count();
        }
    }

    function partner(){
    	return $this->belongsTo(Partner::class);
    }
}
