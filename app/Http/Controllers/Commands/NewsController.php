<?php

namespace App\Http\Controllers\Commands;

use App;
use App\Http\Controllers\Controller;
use App\News as News;
use App\Logs as Logs;
use App\Http\Controllers\Helpers\GuzzleHelperController as GuzzleHelper;

class NewsController extends Controller
{
    protected $client;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client=New GuzzleHelper();
    }

    public function getNews()
    {
         if ($_SERVER['HTTP_USER_AGENT'] != '3215523')
         {
            echo "Error";
            exit;
         }

         $this->client->processNews();
      }  
}
