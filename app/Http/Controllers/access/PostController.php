<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Main_menu;
use App\Models\Post_additional_field;
use App\Models\Post_additional_info;
use Illuminate\Http\Request;
use Auth;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class PostController extends Controller
{
    public function __construct(){ $this->middleware('auth');}

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('pages.page_content.index',compact('posts'));
    }

 
    public function create()
    {
        $menus = Main_menu::latest()->get();
        $post = new Post();
        $fields = Post_additional_field::all();
        return view('pages.page_content.create',compact('menus','post','fields'));
    }


    public function store(Request $request)
    {
        toast('Some fields are not filled up corectly!<br>Please check your input fields & try again!!','error');
        $data = $this->formValidation();
        $data['user_id'] = Auth::user()->id;
        if (empty($data['sub_menu_id'])) {
            $data['sub_menu_id'] = null; 
        }
        $post = Post::create($data);
        $this->storeImage($post);

        //create additonal fields 
        if(is_array($request->field_names)){
            foreach ($request->field_names as $key => $field) {
                // echo $field.' '.$request->field_value[$key].'<br/>';
                Post_additional_info::create([
                    'post_id'=>$post->id,'post_additional_field_id'=>$field,
                    'field_value'=>$request->field_value[$key]
                ]);
            }
        }
        toast('Page Content has been created successfully!','success');
        return redirect('/access/website/posts');
    }


    public function edit(Post $post)
    {
        $menus = Main_menu::latest()->get();
        $fields = Post_additional_field::all();
        return view('pages.page_content.edit',compact('menus','post','fields'));
    }


    public function update(Request $request, Post $post)
    {
        toast('Some fields are not filled up corectly!<br>Please check your input fields & try again!!','error');
        $data = $this->formValidation($post->id);
        $data['user_id'] = Auth::user()->id;
        if (empty($data['sub_menu_id'])) {
            $data['sub_menu_id'] = null; 
        }
        $post->update($data);

        $this->storeImage($post);
        //delete all files with this post id
        Post_additional_info::where('post_id',$post->id)->delete();
        //create additonal fields 
        if(is_array($request->field_names)){
            foreach ($request->field_names as $key => $field) {
                Post_additional_info::create([
                    'post_id'=>$post->id,'post_additional_field_id'=>$field,
                    'field_value'=>$request->field_value[$key]
                ]);
            }
        }
        toast('Page Content has been updated successfully!','success');
        return redirect('/access/website/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        toast('Page Content has been remvoed successfully!','success');
        return back();
    }

    private function formValidation(){
        return request()->validate( [
            'main_menu_id'=>'required',
            'sub_menu_id'=>'sometimes|nullable',
            'title'=>'required',
            'photo'=>'sometimes|nullable|image|max:3048',
            'description'=>'required',
            'status'=>'required',
            'related_post'=>'required',
        ]);  
    }


    //store photo
    function storeImage($post){
        if (request()->has('photo')) {
            $fileName = time().'.'.request()->photo->extension();  
            request()->photo->move('images/page-contents/', $fileName);

            $manager = new ImageManager(new Driver());
            // open an image file
            $image = $manager->read('images/page-contents/'.$fileName);
            $image->resize(900,650)->save();

            // Image::make('images/page-contents/'.$fileName)->fit(900,650)->save();
            $post->update(['photo'=>'images/page-contents/'.$fileName]);
        }
    }
}
