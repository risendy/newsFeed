<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Repositories\NewsRepository as NewsRepository;
use App\News as News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  private $newsRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function showNews($id)
    {
       $news = $this->newsRepository->findNewsById($id);

       return view('pages.showNews', compact('news'));
    }   
}
