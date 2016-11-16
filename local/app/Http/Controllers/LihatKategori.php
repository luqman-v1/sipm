<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;
class LihatKategori extends Controller
{
    public function lihat(){
    	$kate=\App\Category::all();
    	return view('admin/tampilKategori',['kate'=>$kate]);
    }
     public function destroy($id){
     	 if (Auth::guest()){
     	 	return view('errors.404xx');
     	 }
     	 else{
			 DB::table('category')->where('id',$id)->delete() ;
		     return Redirect()->back()->with('status','data berhasil di hapus');

     	 }

    }
}
