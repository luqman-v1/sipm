<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests\EditorRequest; 
use Validator;
class Maps extends Controller
{
    public function map(){
    	  $kate=\App\Category::all();
    	  if($id = Input::get('category')){
    	  	$articles=\App\Article::where('id_category','=',$id)->get();
    	  	}else{
    	  		$articles = [];
    	  }
        return view('/maps')->with('articles',$articles)
        					->with('kate',$kate)
        					->with('id',$id);

    }
}
