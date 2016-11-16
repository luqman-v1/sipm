<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class tambah extends Controller
{
      public function keluhan(){
      	$kate=\App\Category::all();
    	return view('tambahKeluhan',['kate'=>$kate]);
    }
}
