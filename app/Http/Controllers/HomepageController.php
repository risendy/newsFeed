<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\News as News;

class HomepageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
       $news = News::orderBy('publishedAt', 'desc')->take(8)->get();
 
       return view('homepage', compact('news'));
    }   

    //
}
