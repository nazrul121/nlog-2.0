<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;

use App\Models\Fun_factor;
use App\Models\Fun_factor_field;
use App\Models\Main_menu;
use Illuminate\Http\Request;

use Session;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Auth;

class FunFactorController extends Controller
{
    public function index()
    {
        $factors = Fun_factor::all();
        $fun_factor_field = new Fun_factor();
        return view('pages.fun_factor.index',compact('factors','fun_factor_field'));
    }

    public function create()
    {
        $menus = Main_menu::all();
        $factors = new Fun_factor();
        $fun_factor = new Main_menu();
        return view('pages.fun_factor.create',compact('factors','menus','fun_factor'));
    }


    public function store(Request $request)
    {
        $data = $this->formValidation();
        // dd($request->all());
        
        if(empty($request->sub_menu_id)) {
            $data['sub_menu_id'] = null;
        }
        else $data['sub_menu_id'] =$request->sub_menu_id;
        
        $factor = Fun_factor::create(array_merge($data,['user_id'=>Auth::user()->id]));
        $this->storeImage($factor);
        toast('The factor has been saved successfully!','success');
        return redirect('/access/website/fun-factors');
    }


    public function show(Fun_factor $fun_factor)
    {
        //
    }


    public function edit(Fun_factor $fun_factor)
    {
        $menus = Main_menu::all();
        return view('pages.fun_factor.edit',compact('fun_factor','menus'));
    }

    public function update(Request $request, Fun_factor $fun_factor)
    {
        $data = $this->formValidation();
        
        if(empty($request->sub_menu_id)) {
            $data['sub_menu_id'] = null;
        }
        else $data['sub_menu_id'] =$request->sub_menu_id;

        $fun_factor->update(array_merge($data,['user_id'=>Auth::user()->id]));
        $this->storeImage($fun_factor);
        toast('The factor has been updated successfully!','success');
        return redirect('/access/website/fun-factors');
    }


    public function destroy(Fun_factor $fun_factor)
    {
        Fun_factor_field::where('fun_factor_id',$fun_factor->id)->delete();
        // Delete the file
        \File::delete(public_path('/') . $fun_factor->background_photo);
        \File::delete(public_path('/') . $fun_factor->model_photo);

        // dd($fun_factor->background_photo);
        $fun_factor->delete();
        toast('Counter factor has been deleted successfully!','success');
        return back();
    }

    private function formValidation($id=null){
        return request()->validate( [
            'main_menu_id'=>'required',
            'sub_menu_id'=>'sometimes|nullable',
            'background_photo'=>'sometimes|nullable|image|max:1048',
            'model_photo'=>'sometimes|nullable|image|max:2048',
            'display_number'=>'required'

        ]);
    }


    //store photo
    function storeImage($factor){
        if (request()->has('background_photo')) {
            $fileName = 'background-'.time().'.'.request()->background_photo->extension();
            request()->background_photo->move('images/fun_factors/', $fileName);
            // Image::make('images/fun_factors/'.$fileName)->resize(300,300)->save();
            $factor->update(['background_photo'=>'images/fun_factors/'.$fileName]);
        }
        if (request()->has('model_photo')) {
            $fileName = 'model-'.time().'.'.request()->model_photo->extension();
            request()->model_photo->move('images/fun_factors/', $fileName);
            $manager = new ImageManager(new Driver());
            // open an image file
            $image = $manager->read('images/fun_factors/'.$fileName);
            $image->cover(1000,800)->save();

            $factor->update(['model_photo'=>'images/fun_factors/'.$fileName]);
        }
    }
}
