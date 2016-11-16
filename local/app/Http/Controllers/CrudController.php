<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'ini adalah resource artis';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'ini adalah resource "artis/create"';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
            //bagian ini untuk melakukan validasi data, agar data sesuai dengan harapan
        $validator = Validator::make($request->all(),[
         'category' => 'required',
         'image' => 'required',
         'g-recaptcha-response' => 'required|captcha',
         ]);
        //jika tidak sesuai validasi maka error
        if($validator->fails()){
         return redirect()
                 ->back()
                 ->withErrors($validator)
                 ->withInput();
        }

        $tes = new \App\Article;
        $tes -> nama = $request ->get('nama');
        $tes -> alamat = $request ->get('alamat');
        $tes -> deskripsi = $request ->get('deskripsi');
        $tes -> id_category = $request ->get('category');
        $tes -> locLat = $request ->get('locLat');
        $tes -> locLng = $request ->get('locLng');

        if (Input::file('image')->isValid()) {
          $destinationPath = 'uploads'; // upload path
          $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
          $fileName = rand(11111,99999).'.'.$extension; // renameing image
          Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
          // sending back with message
         $tes-> pict = $fileName;
    }
        $tes->save();
        return \Redirect::to('/tambah')
                ->with('message','Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
       return 'jozz';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'ini adalah resource "artis/'.$id.'/edit"';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return 'ini adalah resource "artis/'.$id.'/update"';
    }

    /**

     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return 'oke';
    }
}
