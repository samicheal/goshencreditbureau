<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Creditor;
use App\Company;

class frontEndController extends Controller
{
    public function search(){

        return view('frontend.index');
    }
    
    public function result(){
        $first = str_split(request()->firstname);
        $result = Creditor::where([['firstname','like',$first[0].'%'],['lastname','like','%'.request()->lastname.'%']])->get();

        $individual = request()->firstname.' '.request()->lastname;

        return view('frontend.result',['result' => $result,'individual' => $individual]);
    }
    public function result2(){
        $com = explode(' ',request()->company_name);
        $result = Company::where('company_name', 'like', '%'.$com[0].'%')->get();

        $company = request()->company_name;

        return view('frontend.companyresult',['result' => $result,'company' => $company]);
    }
}
