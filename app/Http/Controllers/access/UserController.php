<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Http\UploadedFile;
//user this intervention image library to resize/crop image
use Intervention\Image\Facades\Image; 
// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::latest()->get();
        $user = new User();
        return view('pages.users.index',compact('users','user'));
    }

    public function create()
    {
        $user = new User();
        if($user->is_admin()){
            return view('pages.users.create',compact('user'));
        }
        
    }

    public function store(Request $request)
    {
        Session::flash('create_user', 'no'); 
        $data = $this->formValidation();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);  $this->storeImage($user);
        toast('User information has been saved successfully!','success');
        Session::forget('create_user'); return redirect('/access/user/users');
    }


    public function edit(User $user)
    {
        $user = new User();
        if($user->is_admin()){
            return view('pages.users.edit',compact('user'));
        }
    }

    public function update(Request $request, User $user)
    {
        Session::flash('create_user', 'no'); 
        $data = $this->formValidation($user->id);
        $data['password'] = Hash::make($request->password);
        $user->update($data);  $this->storeImage($user);
        toast('User information has been saved successfully!','success');
        Session::forget('create_user'); return redirect('/access/user/users');
    }

  
    public function destroy($id)
    {
        $userM = new User();
        if($userM->is_admin()){

        }
    }

    private function formValidation($id=null){
        return request()->validate( [
            'role'=>'required',
            'name'=>'required',
            'sex'=>'required',
            'mobile'=>'required|unique:users,mobile,'.$id,
            'photo'=>'sometimes|nullable|image|max:1048',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required',
            'address'=>'required',
            'status'=>'required'
        ]);  
    }


    //store photo
    function storeImage($user,$type=null){
        if (request()->has('photo')) {
            $fileName = time().'.'.request()->photo->extension();  
            request()->photo->move('images/users/', $fileName);
            Image::make('images/users/'.$fileName)->fit(320,290)->save();
            $user->update(['photo'=>'images/users/'.$fileName]);
        }else{
            if($type !='update'){
                $user->update(['photo'=>'images/'.request()->sex.'.jpg']);
            }
            
        }
    }
}
