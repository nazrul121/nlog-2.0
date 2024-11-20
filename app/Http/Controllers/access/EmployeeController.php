<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Employee_type;
use Illuminate\Http\Request;
use Session;
use Illuminate\Http\UploadedFile;
//user this intervention image library to resize/crop image
use Intervention\Image\Facades\Image; 
// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        $categories = Employee_type::all();
        $employee = new Employee();
        return view('pages.employee.index',compact('employee','employees','categories'));
    }


    public function create()
    {
        $employee = new Employee();
        $categories = Employee_type::all();
        return view('pages.employee.create',compact('employee','categories'));
    }

    public function store(Request $request)
    {
        Session::flash('create_emp', 'no'); 
        $data = $this->formValidation();
        $employee = Employee::create($data);
        $this->storeImage($employee);
        toast('New employee information has been saved successfully!','success');
        Session::forget('create_emp'); 
        return redirect('/access/employee/employee-table');
    }


    public function edit(Employee $employee)
    {
        $categories = Employee_type::all();
        return view('pages.employee.edit',compact('employee','categories'));
    }

    public function update(Request $request, Employee $employee)
    { 
        $data = $this->formValidation($employee->id);
        $employee->update($data);
        $this->storeImage($employee);
        toast('New employee information has been saved successfully!','success');
        return redirect('/access/employee/employee-table');
    }

    public function destroy(Employee $employee)
    {
        //
    }

    private function formValidation($id=null){
        return request()->validate( [
            'employee_type_id'=>'required',
            'position'=>'required',
            'name'=>'required',
            'sex'=>'required',
            'mobile'=>'required|unique:employees,mobile,'.$id,
            'email'=>'required|email|unique:employees,email,'.$id,
            'salary'=>'sometimes|nullable',
            'photo'=>'sometimes|nullable|image|max:1048',
            'address'=>'required',
            'status'=>'required'

        ]);  
    }


    //store photo
    function storeImage($employee){
        if (request()->has('photo')) {
            $fileName = time().'.'.request()->photo->extension();  
            request()->photo->move('images/employees/', $fileName);
            Image::make('images/employees/'.$fileName)->fit(320,290)->save();
            $employee->update(['photo'=>'images/employees/'.$fileName]);
        }
    }
}
