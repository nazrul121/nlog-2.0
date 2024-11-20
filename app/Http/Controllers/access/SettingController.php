<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Main_menu;
use App\Models\Latest_post_menu;
use Illuminate\Http\Request;
use DB;
class SettingController extends Controller
{
   
    function index(){
        $menus = Main_menu::orderBy('order_by','ASC')->get();
        $latest_post_menus = Latest_post_menu::select('main_menu_id')->get();
        
        $latest_post_menu = array();
        foreach ($latest_post_menus as $key => $menu) {
            $latest_post_menu[] = $menu->main_menu_id;
        }

        return view('pages.settings.index',compact('menus','latest_post_menu'));
    }

    public function update(Request $request, Setting $setting)
    {
       
        Setting::where('type','show-greetings')->update(['value'=>$request->show_greetings]);

        if (is_array($request->show_org_info)) {
            Setting::where('type','show-company-info')->update(['value'=>strtolower( implode(',',$request->show_org_info) )]);
        }else{
            Setting::where('type','show-company-info')->update(['value'=>null]);
        }


        if (is_array($request->menus)) {
            Latest_post_menu::truncate();
            foreach ($request->menus as $key => $id) {
                Latest_post_menu::create(['main_menu_id'=>$id]);
            }
        }
        
        if(!empty($request->menu)) $menu = $request->menu; else $menu=null;

        // dd($request->all());

        Setting::where('type','home-post-single-menu-number')->update(['value'=>$request->home_post_single_menu_number]);
        Setting::where('type','home-post-single-title')->update(['value'=>$request->home_post_single_title]);
        Setting::where('type','home-post-single-menu')->update(['value'=>$menu]);

        Setting::where('type','home-post-multiple-title')->update(['value'=>$request->home_post_multiple_title]);
        Setting::where('type','home-post-multiple-menu-number')->update(['value'=>$request->home_post_multiple_menu_number]);

        if (is_array($request->show_employee_info)) {
            $employee_menus = strtolower(implode(',',$request->show_employee_info));
        }else $employee_menus = null;
        Setting::where('type','show-employee-info')->update(['value'=>$employee_menus]);

        $check = Setting::where('type','photo-slider-at');
        if($check->count() >0){
            $check->update(['value'=>$request->photo_slider]);
        }else Setting::create(['type'=>'photo-slider-at','value'=>$request->photo_slider]);

        toast('Settings has been updated successfully','success'); return back();
    }

}
