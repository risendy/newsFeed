<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\News as News;
use App\Http\Controllers\Repositories\NewsRepository as NewsRepository;

class RecycleService extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function removeOldNews($days)
    {
         $newsRepository=new NewsRepository();

         $newsRepository->removeOldNews($days);
      }  
}
