<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Main_menu;
use App\Models\Sub_menu;
use App\Models\Post;
use App\Models\Form;
use App\Models\Slider;
use App\Models\Greeting;
use App\Models\Form_detail;
use App\Models\Post_additional_info;
use App\Models\Client_slider;
use App\Models\Partner_slider;
use DB;


class FrontController extends Controller
{
    function index(){
        $menus = $this->menu();
        $postNum = request()->get('home-post-single-menu-number');
        $postNum2 = request()->get('latest-post-at-home');
        $checkG = Greeting::where('status','1');
        if ($checkG->count()>0) {
            $greeting = Greeting::where('status','1')->first();
        }else $greeting = new Greeting();

        $sliders = Slider::where('main_menu_id','1')->where('slider_type_id','1')->get();
        // dd($sliders);
        $home_post_menu = DB::table('settings')->where('type','home-post-single-menu')->pluck('value')->first();
        $home_posts = Post::where('main_menu_id',$home_post_menu)->where('status','1')->latest()->limit($postNum)->get();
        // dd($home_posts);
        $home_post_title = DB::table('settings')->where('type','home-post-single-title')->pluck('value')->first();

        $fun_factor =  DB::table('fun_factors')->where('main_menu_id','1')->first();

        $multiple_posts = Post::select('posts.*')
        ->rightJoin('latest_post_menus', 'posts.main_menu_id', '=', 'latest_post_menus.main_menu_id')
        ->inRandomOrder()->limit($postNum2)->get();

        $menu_id = 1;
        $post_multiple_title = DB::table('settings')->where('type','home-post-multiple-title')->pluck('value')->first();
      
    	return view('welcome',compact('menus','menu_id','sliders','greeting','home_posts','multiple_posts','home_post_title','post_multiple_title','fun_factor'));
    }

    function main_menu_page($title){
    	$title = str_replace('-', ' ', $title);
    	$menu = Main_menu::where('title',$title)->first();
        $menu_id = $menu->id;

    	if ($menu==null) {return back();}

        $menus = $this->menu();
    	$forms = Form::where('main_menu_id',$menu->id)->where('status','1')->get();
        $posts = Post::where('main_menu_id',$menu->id)->where('status','1')->get();
    	$sliders = Slider::where(['main_menu_id'=>$menu->id,'slider_type_id'=>'3'])->get();
        $fun_factor =  DB::table('fun_factors')->where('main_menu_id',$menu->id)->first();
    	return view('main_menu_page',compact('menus','menu_id','menu','posts','forms','sliders','fun_factor'));
    }

    function sub_menu_page(Sub_menu $sub_menu, $slug){
        $menus = $this->menu();
    	$menu = $sub_menu;
    	
    	$posts = Post::where('sub_menu_id',$menu->id)->where('status','1')->get();
        $forms = Form::where('sub_menu_id',$menu->id)->get();
    	return view('sub_menu_page',compact('menus','menu','posts','forms'));
    }

    function post_details(Post $post){
        $menus = $this->menu();
        $additional_data = Post_additional_info::where('post_id',$post->id)->get();
        if ($post->sub_menu_id==null) {
            $related_posts = Post::select('id','title','photo')->where('id','!=',$post->id)->where('main_menu_id',$post->main_menu_id)->where('status','1')->get();
        }else{
            $related_posts = Post::select('id','title','photo')->where('id','!=',$post->id)->where('sub_menu_id',$post->sub_menu_id)->where('status','1')->get();
        }
        
        return view('post',compact('menus','post','related_posts','additional_data'));
    }

    function save_form(Request $request){
        $fields = $request->all();
     
        array_pop($fields); // delete the last element of an array
        array_shift($fields);// remove the fiest elemet of an araray 
        
        foreach ($fields as $key => $value) {
            if ($this->is_required($request->form_id,$fields[$key]=='1')) {
                $fields[$key] = 'required';
            }else $fields[$key] = '';
        }

        toast('The form is not fillued up correctly!','error');
        request()->validate( $fields ); 

        $data_fields = $request->all();
        $form_detail = Form_detail::where('form_id',$request->form_id)->get();
        
        foreach($form_detail as $fd){
            if($fd->field_type=='checkbox'){
                // echo $fd->field_type.'</br>';
                $checkboxField = str_replace(' ', '_', $fd->field_name);
                $data_fields[$checkboxField] = implode(',',$request->$checkboxField);
            }
            
            if($fd->field_type=='file'){
                $fileField = str_replace(' ', '_', $fd->field_name);
                // dd($request->$fileField);
                $name = $fd->field_name.'-'.rand(99,1000).'.'.$request->$fileField->extension();
                $request->$fileField->move(public_path().'/form-files/', $name); 
                $data_fields[$fileField] = '/form-files/'.$name;
            }
        }
        
       
        
        // array_pop($data_fields); // delete the last element of an array
        array_shift($data_fields);// remove the fiest elemet of an araray 
        unset($data_fields['table']);//remove table field for the array
        unset($data_fields['form_id']);
        //  dd($data_fields);
        $data_fields2 = array();
        foreach($data_fields as $key=>$data){
            $data_fields2[strtolower($key)]=$data;
        }
        // dd( $data_fields2);
        
        DB::table( strtolower(str_replace(' ', '_', $request->table)) )->insert( [$data_fields2]);
        toast('Your form has been submitted successlly!','success');return back();
    }

    function menu(){
        return Main_menu::where('status','1')->orderBy('order_by','ASC')->get();
    }

    function is_required($form_id,$field_name){
        return Form_detail::where('form_id',$form_id)->where('field_name',$field_name)->pluck('is_required')->first();
    }

}
