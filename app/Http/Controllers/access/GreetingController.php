<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use App\Models\Greeting;
use Illuminate\Http\Request;
use Session;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Auth;
class GreetingController extends Controller
{

    public function index()
    {
        $greetings = Greeting::all();
        $greeting = new Greeting();
        return view('pages.greetings.index',compact('greetings','greeting'));
    }

    public function store(Request $request)
    {
        Session::flash('greetings', 'no'); 
        $data = $this->formValidation();
        $greeting = Greeting::create(array_merge($data,['user_id'=>Auth::user()->id]));
        $this->storeImage($greeting);
        toast('Welcome greetings has been saved successfully!','success');
        // make all post`s status inactive except this one
        if ($request->status=='1') {
            Greeting::where('id','!=',$greeting->id)->update(['status'=>'0']);
        }
        Session::forget('greetings'); return redirect('/access/website/greetings');
    }

    public function show(Greeting $greeting)
    {
        //
    }

    public function edit(Greeting $greeting)
    {
        $greetings = Greeting::all();
        return view('pages.greetings.edit',compact('greetings','greeting'));
    }


    public function update(Request $request, Greeting $greeting)
    {
        $data = $this->formValidation($greeting->id);
        $greeting->update(array_merge($data,['user_id'=>Auth::user()->id]));
        $this->storeImage($greeting);
        toast('Welcome greetings has been updated successfully!','success');
        // make all post`s status inactive except this one
        if ($request->status=='1') {
            Greeting::where('id','!=',$greeting->id)->update(['status'=>'0']);
        }
        return redirect('/access/website/greetings');
    }

    public function destroy(Greeting $greeting)
    {
        //
    }


    private function formValidation($id=null){
        return request()->validate( [
            'title'=>'required',
            'photo'=>'sometimes|nullable|image|max:2048',
            'description'=>'required',
            'bg_color'=>'sometimes|nullable',
            'video_link'=>'required',
            'status'=>'required'
        ]);  
    }


    //store photo
    function storeImage($greeting){
        // dd($greeting);
        if (request()->has('photo')) {
            $fileName = time().'.'.request()->photo->extension();  
            request()->photo->move('images/greetings/', $fileName);

            $manager = new ImageManager(new Driver());
            // open an image file
            $image = $manager->read('images/greetings/'. $fileName);
            $image->cover(1920,1080)->save();

            $greeting->update(['photo'=>'images/greetings/'. $fileName]);
        }
    }
}
