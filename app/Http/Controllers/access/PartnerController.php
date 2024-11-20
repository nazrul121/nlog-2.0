<?php

namespace App\Http\Controllers\access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;
//user this intervention image library to resize/crop image
use Intervention\Image\Facades\Image; 
// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();
        $partner = new Partner();
        return view('pages.partners.index',compact('partners','partner'));
    }

    public function create()
    {
        $partner = new Partner();
        return view('pages.partners.create',compact('partner'));
    }

    public function store(Request $request)
    {
        toast('Form validation error!<br>Please fill up the form correctly!!','error');
        $data = $this->formValidation();
        $partner = Partner::create($data);  $this->storeImage($partner);
        toast('Partner information has been saved successfully!','success');
        return redirect('/access/partner/index');
    }

    public function show(Partner $partner)
    {
        //
    }

    public function edit(Partner $partner)
    {
         return view('pages.partners.edit',compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
       
        toast('Form validation error!<br>Please fill up the form correctly!!','error');
        $data = $this->formValidation($partner->id);
        $partner->update($data);  $this->storeImage($partner,'update');
        toast('Partner information has been updated successfully!','success');
        return redirect('/access/partner/index');
    }

    public function destroy($id)
    {
        //
    }

    private function formValidation($id=null){
        return request()->validate( [
            'name'=>'required',
            'company'=>'required',
            'phone'=>'required|unique:partners,phone,'.$id,
            'photo'=>'sometimes|nullable|image|max:1048',
            'logo'=>'sometimes|nullable|image|max:1048',
            'email'=>'required|email|unique:partners,email,'.$id,
            'address'=>'required',
            'status'=>'required'
        ]);  
    }


    //store photo
    function storeImage($clinet,$type=null){
        if (request()->has('photo')) {
            $fileName = time().'.'.request()->photo->extension();  
            request()->photo->move('images/Partners/', $fileName);
            Image::make('images/Partners/'.$fileName)->fit(320,290)->save();
            $clinet->update(['photo'=>'images/Partners/'.$fileName]);
        }else{
            if($type !='update'){
                $clinet->update(['photo'=>'images/sad.png']);
            }
        }

        if (request()->has('logo')) {
            $fileName = rand().'.'.request()->logo->extension();  
            request()->logo->move('images/Partners/', $fileName);
            Image::make('images/Partners/'.$fileName)->fit(190,95)->save();
            $clinet->update(['logo'=>'images/Partners/'.$fileName]);
        }else{
            if($type !='update'){
                $clinet->update(['logo'=>'images/sad.png']);
            }
        }
    }
}
