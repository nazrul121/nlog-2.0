<?php

namespace App\Http\Controllers\access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Fun_factor_field;
class FunFactorField extends Controller
{

    public function store(Request $request)
    {
        Session::flash('fator_field','error');
        toast('Fields are not filled up corectly!!','error'); 
        $data = $this->formValidation();
        // dd($request->all());
        $factor = Fun_factor_field::create($data);
        toast('The factor-field has been created successfully!','success');   
        Session::forget('fator_field');    
        return redirect('/access/website/fun-factors');
    }

    public function show($id)
    {
        //
    }

    public function edit(Fun_factor_field $fun_factor_field)
    {
        return view('pages.fun_factor.fields.edit',compact('fun_factor_field'));
    }

    public function update(Request $request, Fun_factor_field $fun_factor_field)
    {
        Session::flash('fator_field','error');
        toast('Fields are not filled up corectly!!','error'); 
        $data = $this->formValidation();
        // dd($request->all());
        $fun_factor_field->update($data);
        toast('The factor-field has been updated successfully!','success');   
        Session::forget('fator_field'); return redirect('/access/website/fun-factors');
    }

    public function destroy(Fun_factor_field $fun_factor_field)
    {
        $fun_factor_field->delete();
        toast('Counter facto rfiled-item has been deleted successfully!','success');
        return back();
    }

    private function formValidation($id=null){
        return request()->validate( [
            'fun_factor_id'=>'required',
            'field_name'=>'required',
            'field_value'=>'required',
            'status'=>'required'
        ]);  
    }
}
