<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use App\Models\Employee_type;
use Illuminate\Http\Request;
use Session;
class EmployeeTypeController extends Controller
{

    public function index()
    {
        $categories = Employee_type::latest()->get();
        $employee_type = new Employee_type();
        return view('pages.employee.category.index',compact('categories','employee_type'));
    }

    public function store(Request $request)
    {
        toast('Some fields are not filled up corectly!<br>Please check your input fields & try again!!','error');
        Session::flash('create_category', 'no'); 
        $data = $this->formValidation();
        Employee_type::create($data);
        toast('The category has been created successfully!','success');
        Session::forget('create_category'); 
        return back();
    }


    public function edit(Employee_type $employee_type)
    {
        $categories = Employee_type::latest()->get();
        return view('pages.employee.category.edit',compact('categories','employee_type'));
    }


    public function update(Request $request, Employee_type $employee_type)
    {
        toast('Some fields are not filled up corectly!<br>Please check your input fields & try again!!','error');
        $data = $this->formValidation($employee_type->id);
        $employee_type->update($data);
        toast('The category has been updated successfully!','success'); 
        return redirect('/access/employee/category');
    }

    public function destroy(Employee_type $employee_type)
    {
        //
    }

    private function formValidation($id=null){
        return request()->validate( [
            'name'=>'required|unique:employee_types,name,'.$id,
            'description'=>'sometimes|nullable',
        ]);  
    }
}
