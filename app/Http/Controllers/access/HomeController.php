<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Main_menu;
use App\Models\Post;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $forms = $this->forms();
        $menus = $this->menus();
        $total_post = $this->total_post();
        return view('portion.dashboard_admin',compact('total_post','menus','forms'));
    }

    public function forms()
    {
        return Form::select('table_name','table_title')->get();
    }

    public function menus()
    {
        return Main_menu::latest()->get();
    }
    public function total_post()
    {
        return Post::count();
    }
}
