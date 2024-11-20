<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use App\Models\Sub_menu;
use App\Models\Main_menu;
use Illuminate\Http\Request;
use Session;
use Auth;

use Illuminate\Http\UploadedFile;
//user this intervention image library to resize/crop image
use Intervention\Image\Facades\Image; 
// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

class SubMenuController extends Controller
{
    
    public function store(Request $request)
    {
        Session::flash('sub_menu', 'no'); 
        $data = $this->formValidation();
        $sub_menu = Sub_menu::create(array_merge($data,['user_id'=>Auth::user()->id]));
        $this->storeImage($sub_menu);
        toast('Sub-Menu item has been created successfully!','success');
        Session::forget('sub_menu'); 
        return back();
    }

  
    public function edit(Sub_menu $sub_menu)
    {
        $sub = Sub_menu::where('id',$sub_menu->id)->first(); 
        $menus = Main_menu::latest()->get();
        return view('pages.menu.sub_menu.edit',compact('menus','sub'));
    }

    
    public function update(Request $request, Sub_menu $sub_menu)
    {
        $data = $this->formValidation();
        $sub_menu->update($data);
        $this->storeImage($sub_menu);
        toast('Menu item has been updated successfully!','success');
        return redirect('/access/website/main-menus');
    }


    public function destroy(Sub_menu $sub_menu)
    {
        $sub_menu->delete();
        toast('Sub-Menu item has been deleted successfully!','success');
        return back();
    }

    private function formValidation(){
        return request()->validate( [
            'main_menu_id'=>'required',
            'title'=>'required',
            'icon'=>'sometimes|nullable|image|max:1048',
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
            Image::make('images/banner/'.$fileName)->fit(1200,800)->save();
            $menu->update(['icon'=>'images/banner/'.$fileName]);
        }
    }

    // ajax call, Sub-Menus with main_menu_id
    function get_sub_menus($main_menu_id){
        $sub_menus = Sub_menu::where('main_menu_id',$main_menu_id)->get();
        echo '<option value="">Select sub-menu page</optoin>';
        foreach ($sub_menus as $key => $value) {
           echo '<option value="'.$value->id.'">'.$value->title.'</option>';
        }
    }
}
