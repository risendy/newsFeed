<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Repositories\NewsRepository as NewsRepository;
use App\Http\Controllers\Services\PageResolverService;
use App\News as News;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
  private $newsRepository;
  private $pageResolverService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NewsRepository $newsRepository, PageResolverService $pageResolverService)
    {
        $this->newsRepository = $newsRepository;
        $this->pageResolverService = $pageResolverService;
    }

    public function index()
    {
       $news= $this->newsRepository->getHeadlines('general', 8);
       $business = $this->newsRepository->getHeadlines('business', 4);

       $mostRecent = $this->newsRepository->getMostRecent(4);

       return view('pages.homepage', compact('news', 'business', 'mostRecent'));
    }   

    public function getPage($page_id)
    {
       $news = $this->pageResolverService->resolvePage($page_id);

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
