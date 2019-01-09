<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Auth;
use Validator;
use Response;
use Session;
use View;

class adminController2 extends Controller
{
    public function __construct()
    {
        $this->middleware('admin1');
    }
    public function index(){
        $company = Company::all();

        return view('admin.viewcompany',['company' => $company]);
    }

    public function create(){
        return view('admin.addcompany');
    }
    public function saved(Request $request){
        //validation
        $validator = Validator::make($request->all(), [
            'company_name'=> 'required',
            'property_owner' => 'required',
            'judge' => 'required',
            'amount' => 'required',
            'case_no' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $duplicate = Company::where([['company_name','=', request()->company_name],['case_no','=', request()->case_no]])->count();
        if(!$duplicate){
            $company = new Company;

            $company->user_id = Auth::user()->id;
            $company->company_name = request()->company_name;
            $company->property_owner = request()->property_owner;
            $company->judge = request()->judge;
            $company->amount = request()->amount;
            $company->case_no = request()->case_no;
            $company->address = request()->address;
            $company->save();

            return Response::json(array('success' => 'Company record created successfully.'));
        }

        else{
            return Response::json(array('alert' => 'Company with same case number already exists'));
        }
        
    }


    public function edit($id){

        return view('admin.editcompany')->with('company',Company::find($id));
    }


    public function update($id){
        $company = Company::find($id);

        $this->validate(request(),[
            'company_name'=> 'required',
            'property_owner' => 'required',
            'judge' => 'required',
            'amount' => 'required',
            'case_no' => 'required',
            'address' => 'required'
        ]);

        $company->company_name = request()->company_name;
        $company->property_owner = request()->property_owner;
        $company->judge = request()->judge;
        $company->amount = request()->amount;
        $company->case_no = request()->case_no;
        $company->address = request()->address;
        $company->save();

        Session::flash('success','Company record updated successfully');

        return redirect()->route('managecompany');


    }


    public function delete(){
        
        $company = Company::find(request()->id);

        $company->delete();

        return Response::json(array('success' => 1 , 'id' => request()->id));
    }

}
