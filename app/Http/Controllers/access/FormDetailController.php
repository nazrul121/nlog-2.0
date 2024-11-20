<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use App\Models\Form_detail;
use App\Models\Form;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB;
use Validator;
use Illuminate\Support\Str;

class FormDetailController extends Controller
{
    // form extension form form type - ajax call
    public function index($type,$text,$form_id) {
        $form_detail = new Form_detail();
        return view('pages.forms.form-extended-info',compact('type','text','form_id','form_detail'));
    }

    public function field_demo($type) {
        return view('pages.forms.form-extended-demo',compact('type'));
    }
    
    
    public function store(Request $request)
    {
        // $this->create_table('aaaaaaaaa', $request);exit;
        $data= $this->formValidation();
        if ($data->fails()){
             echo '<div class="alert alert-danger outline alert-dismissible mt-3 mb-3" role="alert">
                <i class="fa fa-times-circle"></i> '.$data->errors()->all()[0].'!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>';exit;
        }
        
        $contains = Str::contains($request->field_name, ['.','&','@']);
        if($contains==true){
            toast('You can not add ./&/@ for this field','error');return back();
        }
        
        // check if same form has same input types 
        $checkQ = Form_detail::where('form_id',$request->form_id)
        ->where('field_name',strtolower(str_replace(' ', '_', $request->field_name)));

        if($checkQ->count() > 0){
            echo '<div class="alert alert-danger outline alert-dismissible mt-3 mb-3" role="alert">
                <i class="fa fa-times-circle"></i> The same field at the form is already created!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>';
        }else{
            Form_detail::create(array_merge($this->formFields(),['user_id'=>Auth::user()->id]));
            //create table
            $form = Form::where('id',$request->form_id)->first();
            $this->create_table($form->table_name, $request);
            echo '<div class="alert alert-success outline alert-dismissible mt-3 mb-3" role="alert">
                <i class="fa fa-check-circle"></i> The field has been created successfully!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> 
            <a href="/access/website/show-form/'.$form->id.'" class="alert alert-info form-control"><i class="fa fa-search-plus"></i> View created form</a>

            <script>alert("Form field has been created successfully!");  $(".submitBtn").slideUp(); $(".formArea").remove();
            </script>';
        }
        
    }

    
    public function show(Form_detail $form_detail)
    {
        $type = $form_detail->field_type; $text = $form_detail->field_name;
        $form_id = $form_detail->form_id;
        return view('pages.forms.form-extended-info',compact('type','text','form_id','form_detail'));
    }

    
    public function edit($form_id)
    {
        
       $form = Form::find($form_id);
       $form_detail = Form_detail::where('form_id',$form_id)->first();
       if (!$form_detail) {
            return redirect('/access/website/forms');
        }
       $type = $form_detail->field_type;
       $text = $form_detail->field_name;
        
       return view('pages.forms.form-edit',compact('form_detail','form','form_id','type','text'));
    }


    public function update(Request $request, Form_detail $form_detail)
    {
        $data = $this->formFields();
        
        
        $contains = Str::contains($request->field_name, ['.','&','@']);
        if($contains==true){
            toast('You can not add ./&/@ for this field','error');return back();
        }
        
        $field = strtolower(str_replace(' ', '_', $request->field_name));
        
        if (Schema::hasColumn($form_detail->form->table_name, $field)) {
            $this->renameColumn($form_detail->form->table_name, $form_detail->field_name, $request->field_name);
        }else{
            $this->create_table($form_detail->form->table_name, $request);
        }
        
        $form_detail->update(array_merge($data,['user_id'=>Auth::user()->id]));
        toast('Form field has been updated successfully','success');return back();
    }

    public function sort(Request $request)
    {
        for($i=0; $i<count($request->page_id_array); $i++) {
            echo $request->page_id_array[$i].' ';
            Form_detail::where('id',$request->page_id_array[$i])->update(['sort_by'=>$i]);
            echo 'Updated '.$request->page_id_array[$i].' as '.$i.'<br/>';
        }
    }
    
    public function destroy(Form_detail $form_detail)
    {
       // echo $form_detail->form->table_name;
        $this->deleteColumn($form_detail->form->table_name,$form_detail->field_name);
        $form_detail->delete();
        toast('Table Column has been removed successfully','success'); return back();  
    }

    private function formValidation(){  
        return  Validator::make(request()->all(), [
            'form_id'=>'required',
            'label'=>'sometimes|nullable',
            'field_type'=>'required',
            'field_name'=>'required',
            'placeholder'=>'sometimes|nullable',
            'is_required'=>'required',
            'options'=>'sometimes|nullable',
            'option_values'=>'sometimes|nullable',
            'width'=>'required'
        ]);
    }

    private function formFields(){
        return request()->validate( [
            'form_id'=>'required',
            'label'=>'sometimes|nullable',
            'field_type'=>'required',
            'field_name'=>'required',
            'placeholder'=>'sometimes|nullable',
            'is_required'=>'required',
            'options'=>'sometimes|nullable',
            'option_values'=>'sometimes|nullable',
            'width'=>'required'
        ]);  
    }

   
    public function create_table($tableName,$request)
    {
        // dd(strtolower(str_replace(' ', '_', $tableName)));
        Session::put('field_name',strtolower(str_replace(' ', '_', $request->field_name)));
        Session::put('table_name',strtolower(str_replace(' ', '_', $tableName)));

        if (!Schema::hasTable(Session::get('table_name'))) {
            Schema::create(Session::get('table_name'), function (Blueprint $table) {
                $table->id();
                if (!Schema::hasColumn(Session::get('table_name'), Session::get('field_name'))); {
                    $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                    $table->enum('seen',['0','1'])->default('0');
                    $table->string(Session::get('field_name'));
                }
            });
        }else{
            Schema::table(Session::get('table_name'), function (Blueprint $table) {
                if (!Schema::hasColumn(Session::get('table_name'), Session::get('field_name'))); {
                    $table->string(Session::get('field_name'));
                }
                
            });
        } Session::forget('field_name'); Session::forget('table_name'); 
    }


    public function deleteColumn($table,$column)
    {
        Session::put('table', $table);
        Session::put('column',strtolower(str_replace(' ', '_', $column)));
        
        if(Schema::hasColumn(Session::get('table'), Session::get('column')))
        {
            Schema::table(Session::get('table'), function($table) {
                $table->dropColumn(Session::get('column'));
            });
        }

        Session::forget('field'); Session::forget('column'); 
    }

    public function renameColumn($table,$oldColumn,$newColumn)
    {
        Session::put('table', $table);
        Session::put('oldColumn',strtolower(str_replace(' ', '_', $oldColumn)));
        Session::put('newColumn',strtolower(str_replace(' ', '_', $newColumn)));
        
       // echo  Session::get('oldColumn').' '.Session::get('newColumn');exit;
        Schema::table(Session::get('table'), function(Blueprint $table) {
            $table->renameColumn(Session::get('oldColumn'),Session::get('newColumn'));
        });

        Session::forget('table');Session::forget('oldColumn');Session::forget('newColumn');
    }

}
