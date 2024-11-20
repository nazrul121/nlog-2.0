<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use App\Models\Main_menu;
use App\Models\Latest_post_menu;
use App\Models\Sub_menu;
use App\Models\Fun_factor;
use App\Models\Post;
use Illuminate\Http\Request;
use Session;
use Auth;

use Illuminate\Http\UploadedFile;
//user this intervention image library to resize/crop image
use Intervention\Image\Facades\Image; 
// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;
use RealRashid\SweetAlert\Facades\Alert;

class MainMenuController extends Controller
{
    
    public function index()
    {

        $menus = Main_menu::orderBy('order_by','ASC')->get();
        $menu = new Main_menu();
        $sub = new Sub_menu();
        return view('pages.menu.main_menu.index',compact('menus','menu','sub'));
    }

    public function store(Request $request)
    {
        Session::flash('main_menu', 'no'); 
        $data = $this->formValidation();
        $menu = Main_menu::create($data);
        $this->storeImage($menu);
        toast('Menu item has been created successfully!','success');
        Session::forget('main_menu'); 
        return back();
    }

  
    public function show(Main_menu $main_menu)
    {
        //
    }

 
    public function edit(Main_menu $main_menu)
    {
        $menu = Main_menu::where('id',$main_menu->id)->first();
        $sub = new Sub_menu();
        return view('pages.menu.main_menu.edit',compact('menu','sub'));
    }


    public function update(Request $request, Main_menu $main_menu)
    {
        // dd($request->all());
        $data = $this->formValidation($main_menu->id);
        $main_menu->update($data);
        $this->storeImage($main_menu);
        toast('Menu item has been updated successfully!','success');
        return redirect('/access/website/main-menus');
    }

   
    public function destroy(Main_menu $main_menu)
    {
        $latestMenuFk = Latest_post_menu::where('main_menu_id',$main_menu->id)->count();
        $postFk = Post::where('main_menu_id',$main_menu->id)->count();
        $funFk = Fun_factor::where('main_menu_id',$main_menu->id)->count();
        if($latestMenuFk >0 || $postFk >0 || $funFk >0){
            toast('The menu is assigned with some other records. <br> Cannot be deleted record while data exist in other table!','error');
        }else{
            Main_menu::where('id',$main_menu->id)->delete();
            toast('Menu item has been removed successfully!','success');
        }return back();
    }

    function sort_menu(Request $request){
        for($i=0; $i<count($request->page_id_array); $i++) {
           echo $i.' = '.$request->page_id_array[$i].'<br/>';
            Main_menu::where('id',$request->page_id_array[$i])->update(['order_by'=>$i]);
        }
    }

    private function formValidation($id=null){
        return request()->validate( [
            'title'=>'required|unique:main_menus,title,'.$id,
            'icon'=>'sometimes|nullable|image|max:3048',
            'page_post_type'=>'required',
            'short_description'=>'sometimes|nullable',
            'status'=>'required',
        ]);  
    }


    //store photo
    function storeImage($menu){
        if (request()->has('icon')) {
            $fileName = time().'.'.request()->icon->extension();  
            request()->icon->move('images/banner/', $fileName);
            //Image::make('images/banner/'.$fileName)->fit(1200,800)->save();
            $menu->update(['icon'=>'images/banner/'.$fileName]);
        }
    }
}
