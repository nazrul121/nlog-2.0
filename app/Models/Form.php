<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Form extends Model
{
    protected $guarded = [];

    // form_details from form_id 
    function form_detail_info($id){
    	return Form_detail::where('form_id',$id)->orderBy('sort_by','ASC')->get();
    }
    // form_details from form_id 
    function table_names(){
    	return Form::select('id','table_title')->get();
    }

    public function today_contacts($table)
    {
        return DB::table($table)->whereDate('created_at', DB::raw('CURDATE()'));
    }
    public function total_contacts($table)
    {
        return DB::table($table)->select('*')->get();
        // return DB::table($table)->select('*')->get();
    }

    // relation 
    function main_menu(){
        return $this->belongsTo(Main_menu::class);
    }
    function form_details(){
        return $this->hasMany(Form_detail::class);
    }
}
