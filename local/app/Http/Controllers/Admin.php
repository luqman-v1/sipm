<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class Admin extends Controller
{

	  public function __construct()
    {
        $this->middleware('auth');
    }

	
  public function index(){
        $articles=\App\Article::orderBy('id', 'desc')->paginate(5);
        return view('admin/index',["articles"=>$articles]);
    }
}
