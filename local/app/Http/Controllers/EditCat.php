<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests\EditorRequest; 
use Validator;

class EditCat extends Controller
{
    public function edits($id){
        $kate=\App\Category::all();
    	//menyimpan data ke dalam variable $data dengan query builder
    	$data=DB::table('category')->where('id',$id)->first();
        if($data && $kate = $data && $kate){
    	//menyimpan data secara detai dalam form2
    	return view('admin/editCat')->with('data',$data)
                                ->with('kate',$kate);
                                
    }
      else{
      return view('errors.404xx');
      }
      
    }
    public function postEdit(Request $request, $id){
    	 $validator = Validator::make($request->all(),[
         'image' => 'required',
         ]);
        //jika tidak sesuai validasi maka error
        if($validator->fails()){
         return redirect()
                 ->back()
                 ->withErrors($validator)
                 ->withInput();
        }
        
        if (Input::file('image')->isValid()) {
          $destinationPath = 'uploads'; // upload path
          $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
          $fileName = rand(11111,99999).'.'.$extension; // renameing image
          Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
          // sending back with message
        }
        

     //query builder untuk update data
        DB::table('category')
                ->where('id',$id)
                ->update([
                    'category' => $request->get('kategori'),
                    'img' => $fileName,
                    ]);

    	return redirect()
    			->back()
    			->with('status','Data berhasil di perbaruhi');

    }
}
