<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Creditor;
use App\User;
use Validator;
use Response;
use Session;
use Auth;
use View;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin1');

    }
    public function index(){
        $creditor = Creditor::all();

        return view('admin.view',['creditor' => $creditor]);
    }

    public function create(){
        return view('admin.addcreditor');
    }
    public function saved(Request $request){

        //validation
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname'=> 'required',
            'property_owner' => 'required',
            'judge' => 'required',
            'amount' => 'required',
            'case_no' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $duplicate = Creditor::where([['firstname', '=', $request->firstname],['lastname', '=', $request->lastname],['middlename', '=', $request->middlename],['case_no', '=', $request->id]])->count();
        
        
        if(!$duplicate){
            $creditor = new Creditor;

            $creditor->user_id = Auth::user()->id;
            $creditor->firstname = $request->firstname;
            $creditor->middlename = $request->middlename;
            $creditor->lastname = $request->lastname;
            $creditor->property_owner = $request->property_owner;
            $creditor->judge = $request->judge;
            $creditor->amount = $request->amount;
            $creditor->case_no = $request->case_no;
            $creditor->address = $request->address;
            $creditor->save();

            return Response::json(array('success' => 'Creditor record created successfully.'));
        }

        else{
            return Response::json(array('alert' => 'Creditor with same case number already exists'));
        }
        
    }
    public function edit($id){

        return view('admin.edit')->with('creditor' , Creditor::find($id));
    }
    public function update($id){
        $creditor = Creditor::find($id);

        $this->validate(request(),[
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname'=> 'required',
            'property_owner' => 'required',
            'judge' => 'required',
            'amount' => 'required',
            'case_no' => 'required',
            'address' => 'required'
        ]);

        $creditor->firstname = request()->firstname;
        $creditor->middlename = request()->middlename;
        $creditor->lastname = request()->lastname;
        $creditor->property_owner = request()->property_owner;
        $creditor->judge = request()->judge;
        $creditor->amount = request()->amount;
        $creditor->case_no = request()->case_no;
        $creditor->address = request()->address;
        $creditor->save();

        Session::flash('success','Creditor record updated successfully');

        return redirect()->route('manage');


    }
    public function delete(){
        $creditor = Creditor::find(request()->id);

        $creditor->delete();
        
        return Response::json(array('success' => 1 , 'id' => request()->id));

    }

    public function editUser(){
        $user = User::find(Auth::user()->id);

        return view('admin.edituser')->with('user',$user);
    }

    public function saveChanges($id){
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
        ]);

        $user = User::find($id);

        $user->name = request()->name;
        $user->email = request()->email;
        $user->admin = $user->admin; 

        if(request()->has('password')){
            $user->password = bcrypt(request()->password);
        }

        $user->save();

        Session::flash('success','Profile updated successfully');

        return redirect()->back();

    }

}
