<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Repositories\NewsRepository as NewsRepository;

class PageResolverService extends Controller
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

    public function resolvePage($pageId)
    {
      //buisness
      if ($pageId==2)
      {
         $news=$this->newsRepository->getHeadlines('business', 12);
      }
      //health
      else if ($pageId==3)
      {
          $news=$this->newsRepository->getHeadlines('health', 12);
      }
      //health
      else if ($pageId==4)
      {
          $news=$this->newsRepository->getHeadlines('science', 12);
      }
      //health
      else if ($pageId==5)
      {
          $news=$this->newsRepository->getHeadlines('sports', 12);
      }
      //health
      else if ($pageId==6)
      {
          $news=$this->newsRepository->getHeadlines('technology', 12);
      }

      return $news;
    }  

}
