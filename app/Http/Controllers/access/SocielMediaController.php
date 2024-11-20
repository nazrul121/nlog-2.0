<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use App\Models\Sociel_media;
use Illuminate\Http\Request;
use Auth;

class SocielMediaController extends Controller
{
  
    public function index()
    {
        $list = Sociel_media::all();
        $sociel_media = new Sociel_media();
        return view('pages.social_media.index',compact('list','sociel_media'));
    }

    public function create()
    {
        $sociel_media = new Sociel_media();
        return view('pages.social_media.create',compact('sociel_media'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $data = $this->formValidation();
        Sociel_media::create($data);
        toast('New media information has been saved successfully!','success');
        return redirect('/access/company/create-social-info');
    }

  

    public function edit(Sociel_media $sociel_media)
    {
        return view('pages.social_media.edit',compact('sociel_media'));
    }


    public function update(Request $request, Sociel_media $sociel_media)
    {
        $data = $this->formValidation($sociel_media->id);
        $sociel_media->update($data);
        toast('New media information has been saved successfully!','success');
        return redirect('/access/company/company-social-info');
    }

    private function formValidation($id=null){
        return request()->validate( [
            'media_name'=>'required|unique:sociel_media,media_name,'.$id,
            'media_icon'=>'required',
            'link'=>'required'
        ]);  
    }

}
