<?php

namespace App\Http\Controllers\access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use App\Models\Client;
use App\Models\Clinent_slider;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();
        $client = new Client();
        return view('pages.client.index',compact('clients','client'));
    }

    public function create()
    {
        $client = new Client();
        return view('pages.client.create',compact('client'));
    }

    public function store(Request $request)
    {
        toast('Form validation error!<br>Please fill up the form correctly!!','error');
        $data = $this->formValidation();
        $client = Client::create($data);  $this->storeImage($client);
        toast('Client information has been saved successfully!','success');
        return redirect('/access/client/index');
    }

    public function show(Client $client)
    {
        //
    }

    public function edit(Client $client)
    {
         return view('pages.client.edit',compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        toast('Form validation error!<br>Please fill up the form correctly!!','error');
        $data = $this->formValidation($client->id);
        $client->update($data);  $this->storeImage($client,'update');
        toast('Client information has been updated successfully!','success');
        return redirect('/access/client/index');
    }

    public function destroy($id)
    {
        //
    }

    private function formValidation($id=null){
        return request()->validate( [
            'name'=>'required',
            'company'=>'required',
            'phone'=>'required|unique:clients,phone,'.$id,
            'photo'=>'sometimes|nullable|image|max:1048',
            'logo'=>'sometimes|nullable|image|max:1048',
            'email'=>'required|email|unique:clients,email,'.$id,
            'address'=>'required',
            'status'=>'required'
        ]);  
    }


    //store photo
    function storeImage($clinet,$type=null){
        $manager = new ImageManager(new Driver());

        if (request()->has('photo')) {
            $fileName = time().'.'.request()->photo->extension();  
            request()->photo->move('images/clients/', $fileName);
            $image = $manager->read('images/clients/'.$fileName);
            $image->cover(320,290)->save();

            $clinet->update(['photo'=>'images/clients/'.$fileName]);
        }else{
            if($type !='update'){
                $clinet->update(['photo'=>'images/sad.png']);
            }
        }

        if (request()->has('logo')) {
            $fileName = rand().'.'.request()->logo->extension();  
            request()->logo->move('images/clients/', $fileName);
           
            $image = $manager->read('images/clients/'. $fileName);
            $image->cover(190,95)->save();

            $clinet->update(['logo'=>'images/clients/'.$fileName]);
        }else{
            if($type !='update'){
                $clinet->update(['logo'=>'images/sad.png']);
            }
        }
    }
}
