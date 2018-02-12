<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Repositories\NewsRepository as NewsRepository;
use App\News as News;
use Illuminate\Http\Request;

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
       $newsRepository=new NewsRepository();

       $news=$newsRepository->getHeadlines('general', 8);
       $business = $newsRepository->getHeadlines('business', 4);

       $mostRecent = $newsRepository->getMostRecent(4);

       return view('pages.homepage', compact('news', 'business', 'mostRecent'));
    }   

    public function getPage($page_id)
    {
      $newsRepository=new NewsRepository();

      //buisness
      if ($page_id==2)
      {
         $news=$newsRepository->getHeadlines('business', 12);
      }
      //health
      else if ($page_id==3)
      {
          $news=$newsRepository->getHeadlines('health', 12);
      }
      //health
      else if ($page_id==4)
      {
          $news=$newsRepository->getHeadlines('science', 12);
      }
      //health
      else if ($page_id==5)
      {
          $news=$newsRepository->getHeadlines('sports', 12);
      }
      //health
      else if ($page_id==6)
      {
          $news=$newsRepository->getHeadlines('technology', 12);
      }

       return view('pages.pages', compact('page_id', 'news'));
    }  

    public function search (Request $request)
    {
      $newsRepository=new NewsRepository();

      $searchText = trim($request->input('searchText'));

      $news = $newsRepository->searchNews($searchText);

      return view('pages.search', compact('news', 'searchText'));
    } 

    //
}
