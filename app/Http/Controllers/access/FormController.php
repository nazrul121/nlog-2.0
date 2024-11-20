<?php
namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Form_detail;
use App\Models\Main_menu;
use Illuminate\Http\Request;
use Auth;
use DB;
use PDO;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function index(){
        $forms = Form::latest()->get();
        return view('pages.forms.index',compact('forms'));
    }

    public function create(){
        $menus = Main_menu::all();
        $form = new Form();
        return view('pages.forms.create',compact('menus','form'));
    }

    public function store(Request $request){
        toast('Please check form fields warnings!','error');
        $data = $this->formValidation();

        if(empty($request->sub_menu_id)) {
            $data['sub_menu_id'] = null;
        }
        else $data['sub_menu_id'] =$request->sub_menu_id;
   
        Form::create(array_merge(['table_name'=>'table_'.rand()],$data,['user_id'=>Auth::user()->id]));
        toast('Form has been created successfully!','success');
        return redirect('/access/website/forms');
    }

    public function show(Form $form){
        return view('pages.forms.form-view',compact('form'));
    }

    public function extend(Form $form){
        return view('pages.forms.extend-form',compact('form'));
    }

    public function edit(Form $form){
        $menus = Main_menu::all();
        // dd($form);
        return view('pages.forms.edit',compact('form','menus'));
    }

    public function update(Request $request, Form $form){
        toast('Please check form fields warnings!','error');
        $data = $this->formValidation();
        if(empty($request->sub_menu_id)) {
            $data['sub_menu_id'] = null;
        }
        else $data['sub_menu_id'] =$request->sub_menu_id;
   
        $form->update(array_merge($data,['user_id'=>Auth::user()->id]));
        toast('Form has been updated successfully!','success');
        return redirect('/access/website/forms');
    }

    public function destroy(Form $form){
        //
    }

    private function formValidation(){
        return request()->validate( [
            'table_title'=>'required',
            'main_menu_id'=>'required',
            'sub_menu_id'=>'sometimes|nullable',
            'title'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);  
    }

    

    public function form_message(Form $form)
    {
        $table = strtolower(str_replace(' ', '_', $form->table_name));
        //get columns from table
        $colums = DB::getSchemaBuilder()->getColumnListing($table);
        //get data from table
        $records = DB::table($table)->orderBy('id','DESC')->paginate(12);
        return view('pages.forms.message.index',compact('form','colums','records'));  
    }


    public function getTableColumns($table){
        return DB::getSchemaBuilder()->getColumnListing($table);
    }
      
}
