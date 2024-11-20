<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Main_menu;
use App\Models\Sub_menu;
use App\Models\Post;
use App\Models\Employee;
use App\Models\Employee_slider;
use App\Models\Client;
use App\Models\Client_slider;
use App\Models\Partner;
use App\Models\Partner_slider;
use Illuminate\Http\Request;
use Auth;


use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SliderController extends Controller
{
    public function index($type)
    {
        // echo 'Hi';
        $sliders = Slider::where('slider_type_id',$type)->get();
        return view('pages.sliders.index',compact('sliders'));
    }

    public function create()
    {
        $menus = Main_menu::all();
        $slider = new Slider();
        return view('pages.sliders.create',compact('menus','slider'));
    }


    public function store(Request $request)
    {
        toast('Please check form input field warnings!','error');
        $data = $this->formValidation();
        $data['user_id']=Auth::user()->id;

        if(empty($request->sub_menu_id)) {
            $data['sub_menu_id'] = null;
        }
        else $data['sub_menu_id'] =$request->sub_menu_id;
   
        $slider = Slider::create($data);
        $this->storeImage($slider);
        toast('Page Content has been created successfully!','success');
        return redirect('/access/website/slider/index/'.$request->slider_type_id);
    }

    public function employee_slider($type,$id)
    {
        dd($type);
        $employees = Employee::all();
       
        if ($type=='main_menu') {
            $menu = Main_menu::where('id',$id)->first();
            $emp_sliders = Employee_slider::where('main_menu_id',$id)->get();
        }else{
            $emp_sliders = Employee_slider::where('sub_menu_id',$id)->get();
            $menu = Sub_menu::where('id',$id)->first();
        }
        
        return view('pages.sliders.extend-emp-slider',compact('employees','type','id','emp_sliders','menu'));
    }

    public function set_employee_slider(Request $request, $type ,$menu,$id,$empID)
    {
    
        // echo 'type:'.$type.', menu: '.$menu.', ID:'.$id.', emp '.$request->employee_id;
        
        if ($menu=='main_menu') {
            $main_menu_id = $id; $sub_menu_id = null;
        }else{
            $main_menu_id = null; $sub_menu_id = $id;
        }
        
        if ($type=='add') {
            
            $Q = Employee_slider::where('employee_id',$empID);
            // dd($Q->count());
            if ($Q->count() < 1) {
                // dd($empID);
                $data = [
                    'employee_id'=>$empID, 'main_menu_id'=>$main_menu_id,
                    'sub_menu_id'=>$sub_menu_id,'user_id'=>Auth::user()->id
                ];
              
                Employee_slider::create($data);
               
            }
        }
        if ($type=='remove') {
            // dd('remove');
            Employee_slider::where('employee_id',$empID)->delete();
        }
        
    }

    public function edit(Slider $slider)
    {
        $menus = Main_menu::all();
        return view('pages.sliders.edit',compact('menus','slider'));
    }


    public function update(Request $request, Slider $slider)
    {
        toast('Please check form input field warnings!','error');
        $data = $this->formValidation($slider->id);
        
        $data['user_id']=Auth::user()->id;

        if(empty($request->sub_menu_id)) {
            $data['sub_menu_id'] = null;
        }
        else $data['sub_menu_id'] =$request->sub_menu_id;

        $slider ->update($data);
        $this->storeImage($slider);
        toast('Page Content has been created successfully!','success');
        return redirect('/access/website/slider/index/'.$request->slider_type_id);
    }


    public function logo_slider($type, $id, Slider $slider)
    { 
      
        if($slider->clientOrPartner=='partner'){
            $partners = Partner::all();

            if ($type=='main_menu') {
                $menu = Main_menu::where('id',$id)->first();
                $partner_sliders = Partner_slider::where('main_menu_id',$id)->get();
            }else{
                $partner_sliders = Partner_slider::where('sub_menu_id',$id)->get();
                $menu = Sub_menu::where('id',$id)->first();
            }
            return view('pages.sliders.extend-partner-slider',compact('slider','type','id','partners','partner_sliders','menu'));
        }else{

            $clients = Client::all();
            // dd($clients);
            if ($type=='main_menu') {
                $menu = Main_menu::where('id',$id)->first();
                $client_sliders = Client_slider::where('main_menu_id',$id)->get();
            }else{
                $client_sliders = Client_slider::where('sub_menu_id',$id)->get();
                $menu = Sub_menu::where('id',$id)->first();
            }
            return view('pages.sliders.extend-client-slider',compact('slider','type','id','clients','client_sliders','menu'));
        }

    }

    public function set_logo_slider(Request $request, $type ,$menu,$id, Slider $slider)
    {
        echo 'type:'.$type.', menu:'.$menu.', id:'.$id.', client:'.$request->client_id;

        
        if ($menu=='main_menu') {
            $main_menu_id = $id; $sub_menu_id = null;
            $menu_type='main_menu_id';
        }else{
            $menu_type = 'sub_menu_id';
            $main_menu_id = null; $sub_menu_id = $id;
        }


        if($slider->clientOrPartner=='partner'){
            if ($type=='add') {
                $Q = Partner_slider::where('partner_id',$request->partner_id)
                    ->where($menu_type,$id);
                if ($Q->count() <1) {
                    Partner_slider::create([
                        'partner_id'=>$request->partner_id, 
                        'main_menu_id'=>$main_menu_id,
                        'sub_menu_id'=>$sub_menu_id,
                        'user_id'=>Auth::user()->id
                    ]);
                }
    
            }
            if ($type=='remove') {
                Partner_slider::where('partner_id',$request->partner_id)->delete();
            }
        }else{
            if ($type=='add') {
                $Q = Client_slider::where('client_id',$request->client_id)
                    ->where($menu_type,$id);
                if ($Q->count() <1) {
                    Client_slider::create([
                        'client_id'=>$request->client_id, 
                        'main_menu_id'=>$main_menu_id,
                        'sub_menu_id'=>$sub_menu_id,
                        'user_id'=>Auth::user()->id
                    ]);
                }
    
            }
            if ($type=='remove') {
               Client_slider::where('client_id',$request->client_id)->delete();
            }
        }
        
    }

    public function destroy(Slider $slider)
    {
        //
    }

    private function formValidation($id=null){
        return request()->validate( [
            'slider_type_id'=>'required',
            'clientOrPartner'=>'sometimes|nullable',
            'main_menu_id'=>'required',
            'sub_menu_id'=>'sometimes|nullable',
            'title'=>'required',
            'photo'=>'sometimes|nullable|image|max:3048',
            'description'=>'required',
            'status'=>'required'
        ]);  
    }


    //store photo
    function storeImage($slider){
        if (request()->has('photo')) {
            $fileName = time().'.'.request()->photo->extension();  
            request()->photo->move('images/sliders/', $fileName);

            $manager = new ImageManager(new Driver());
            $image = $manager->read('images/sliders/'.$fileName);

            if (request()->slider_type_id=='1') {
                $image->cover(1920,1080)->save();
            }else{
                $image->cover(320,280)->save();
            }
            
            $slider->update(['photo'=>'images/sliders/'.$fileName]);
        }
    }
}
