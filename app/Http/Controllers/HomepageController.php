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
       $news = News::where('urlToImage', '<>', '', 'and')->orderBy('publishedAt', 'desc')->take(8)->get();
       $mostRecent = News::orderBy('publishedAt', 'desc')->take(4)->get();
       $buisness = News::where('description', '<>', '', 'and')->where('category', 'business')->orderBy('publishedAt', 'desc')->take(4)->get();

       return view('homepage', compact('news', 'buisness', 'mostRecent'));
    }   

    //
}
