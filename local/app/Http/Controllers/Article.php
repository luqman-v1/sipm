<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests\EditorRequest; 
use Validator;

class Article extends Controller
{
    public function detail($id){
    	$details=DB::table('article')->find($id);
    	if($details=$details){
    		return view('artikelDetail',['artikel'=>$details]);	
    	}
    	else{
    	return view('errors.404xx');
    	}
    	
    }

     

 

}
