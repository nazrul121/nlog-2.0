<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use App\Models\Company_info;
use App\Models\Sociel_media;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Http\UploadedFile;
//user this intervention image library to resize/crop image
use Intervention\Image\Facades\Image; 
// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

class CompanyInfoController extends Controller
{

    public function index()
    {
        $info = Company_info::get()->first();
        $social_info = Sociel_media::get();
        return view('pages.company.index',compact('info','social_info'));
    }


    public function edit(Company_info $company_info)
    {
        return view('pages.company.edit-company-info',compact('company_info'));
    }

    public function update(Request $request, Company_info $company_info)
    {
        toast('Some fields are not filled up corectly!<br>Please check your input fields & try again!!','error');
        $data = $this->formValidation();
        $company = $company_info->update(array_merge($data,['user_id'=>Auth::user()->id]));
        $this->storeLogo($company_info);
        $this->storeFavicon($company_info);
        toast('Information has been updated successfully!','success');
        return redirect('/access/company/company-info');
    }

    private function formValidation(){
        return request()->validate( [
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
            'open_time'=>'required',
            'website'=>'required',
            'off_day'=>'required',
            'logo'=>'sometimes|nullable|image|max:2048',
            'favicon'=>'sometimes|nullable|image|max:300',
        ]);  
    }


    //store logo
    function storeLogo($company_info){
        if (request()->has('logo')) {
            $ext = request()->logo->extension();  
            request()->logo->move('images/', 'logo.'.$ext);
            Image::make('images/'.'logo.'.$ext)->fit(150,46)->save();
            $company_info->update(['logo'=>'images/logo.'.$ext]);
        }
    }

    //store favicon
    function storeFavicon($company_info){
        if (request()->has('favicon')) {
            $ext = request()->favicon->extension();  
            request()->favicon->move('images/', 'favicon.'.$ext);
            Image::make('images/favicon.'.$ext)->fit(22,22)->save();
            $company_info->update(['favicon'=>'images/'.'favicon.'.$ext]);
        }
    }

}
