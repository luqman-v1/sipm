<?php

namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests;
use Illuminate\Http\Request;
use Str;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::orderBy('id', 'desc')->paginate(6);
        return view('index',["articles"=>$articles]);
    }
}

