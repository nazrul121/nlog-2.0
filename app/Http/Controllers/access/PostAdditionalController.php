<?php

namespace App\Http\Controllers\access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post_additional_field;
use App\Models\Post_additional_info;
use Session;
class PostAdditionalController extends Controller
{
    public function index()
    {
        $fields = Post_additional_field::all();
        $field  = new Post_additional_field();
        return view('pages.page_content.fields.index',compact('fields','field'));
    }


    public function store(Request $request)
    {
        Session::flash('field', 'no'); 
        $data = $this->formValidation();
        Post_additional_field::create($data);
        toast('Additional field has been created successfully!','success');
        Session::forget('field'); 
        return back();
    }

    
    public function edit(Post_additional_field $post_additional_field)
    {
        $fields = Post_additional_field::all();
        $field  = $post_additional_field;
        return view('pages.page_content.fields.edit',compact('fields','field'));
    }

    public function update(Request $request, Post_additional_field $post_additional_field)
    {
        $data = $this->formValidation($post_additional_field->id);
        $post_additional_field->update($data);
        toast('Additional field has been updated successfully!','success');
        Session::forget('field'); 
        return redirect('/access/website/post-additional-fields');
    }

    public function destroy(Post_additional_field $post_additional_field)
    {
        $count = Post_additional_info::where('post_additional_field_id',$post_additional_field->id)->count();
        
        if($count>0){
            toast('The field is associated with another table!','warning');return back();
        }

        $post_additional_field->delete();
        toast('Additional field has been delete successfully!','success');return back();
    }

    private function formValidation($id=null){
        return request()->validate( [
            'field_name'=>'required|unique:post_additional_fields,field_name,'.$id,
            'field_value'=>'required',
        ]);  
    }
}
