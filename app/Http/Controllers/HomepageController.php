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
       $news = News::where('urlToImage', '<>', '', 'and')->where('category', 'general')->orderBy('publishedAt', 'desc')->paginate(8);
       $mostRecent = News::orderBy('publishedAt', 'desc')->take(4)->get();
       $buisness = News::where('description', '<>', '', 'and')->where('category', 'business')->orderBy('publishedAt', 'desc')->take(4)->get();

       return view('pages.homepage', compact('news', 'buisness', 'mostRecent'));
    }   

    public function getPage($page_id)
    {
      //buisness
      if ($page_id==2)
      {
         $news = News::where('urlToImage', '<>', '', 'and')->where('category', 'business')->orderBy('publishedAt', 'desc')->paginate(12);
      }
      //health
      else if ($page_id==3)
      {
          $news = News::where('urlToImage', '<>', '', 'and')->where('category', 'health')->orderBy('publishedAt', 'desc')->take(8)->paginate(12);
      }
      //health
      else if ($page_id==4)
      {
          $news = News::where('urlToImage', '<>', '', 'and')->where('category', 'science')->orderBy('publishedAt', 'desc')->paginate(12);
      }
      //health
      else if ($page_id==5)
      {
          $news = News::where('urlToImage', '<>', '', 'and')->where('category', 'sports')->orderBy('publishedAt', 'desc')->paginate(12);
      }
      //health
      else if ($page_id==6)
      {
          $news = News::where('urlToImage', '<>', '', 'and')->where('category', 'technology')->orderBy('publishedAt', 'desc')->paginate(12);
      }

       return view('pages.pages', compact('page_id', 'news'));
    }   

    //
}
