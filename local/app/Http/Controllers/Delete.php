<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Auth;
class Delete extends Controller
{
	 public function tampil(){
    	 $articles=Article::orderBy('id', 'desc')->paginate(5);
        return view('admin/index',["articles"=>$articles]);
    }
    public function destroy($id){
        if (Auth::guest()){
        	return view('errors.404xx');
        }
        else{
        	DB::table('article')->where('id',$id)->delete() ;
        return Redirect()->back()->with('status','data berhasil di hapus');
    }

    }
   

}
