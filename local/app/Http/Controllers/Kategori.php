<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class Kategori extends Controller
{


     public function tambah(Request $request){
            //bagian ini untuk melakukan validasi data, agar data sesuai dengan harapan
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

        $tes = new \App\Category;
        $tes -> category = $request ->get('kategori');

        if (($request->hasFile('image'))){
          $destinationPath = 'uploads'; // upload path
          $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
          $fileName = rand(11111,99999).'.'.$extension; // renameing image
          Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
          // sending back with message
         $tes-> img = $fileName;
    }
        $tes->save();
        return \Redirect::to('formKategori')
                ->with('message','Kategori Berhasil disimpan');
    }
    public function tambahIndex(){
    	return view('admin/tambahKategori');
    }

}
