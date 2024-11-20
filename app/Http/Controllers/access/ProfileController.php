<?php

namespace App\Http\Controllers\access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Auth;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index(){
        return view('pages.profile.index');
    }


    public function password()
    {
        return view('auth.passwords.password');
    }

    public function change_password(Request $request)
    {
        toast('Password upgradation is failed! Please try again !!','warning');
        $data = $this->passwordFields();
        $db_password = Auth::user()->password;

        if (Hash::check($request->old_password, $db_password)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            toast('Password has been changed successfully!!','success');
            return redirect()->route('login');
        }else{
            toast('It looks like your current Password is not valid! Please recheck your passwords','error');
            return back();
        }
    }

    public function edit(User $user)
    {
        return view('pages.profile.edit');
    }

    public function update(Request $request, User $user)
    {
        $data = $this->formValidation(Auth::user()->id);
        $user->update($data);
        $this->storeImage($user);
        toast('Profile has been updated successfully!','success');
        return redirect('access/profile');
    }


    private function formValidation($id=null){
        return request()->validate( [
            'name'=>'required',
            'sex'=>'required',
            'mobile'=>'required|unique:users,mobile,'.$id,
            'photo'=>'sometimes|nullable|image|max:1048',
            'email'=>'required|email|unique:users,email,'.$id,
            'address'=>'required'
        ]);  
    }


    private function passwordFields(){
        return request()->validate( [
            'old_password'=>'required',
            'password'=>'required|confirmed'
        ]);
    }


    //store logo
    function storeImage($user){
        if (request()->has('photo')) {
            $fileName = time().'.'.request()->photo->extension();  
            request()->photo->move('images/employees/', $fileName);

            $manager = new ImageManager(new Driver());
            // open an image file
            $image = $manager->read('images/employees/'.$fileName);
            $image->cover(320,280)->save();

            $user->update(['photo'=>'images/employees/'.$fileName]);
        }
    }
}
