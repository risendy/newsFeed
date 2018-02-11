<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use App\News as News;
use App\Logs as Logs;
use App\Http\Controllers\Helpers\GuzzleHelperController as GuzzleHelper;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $client;

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

         $categories = $this->client->getAvailbleCategories();

         for ($j=0; $j < sizeof($categories); $j++) { 
           $category = $categories[$j];

           $this->client->setCategory($category);

           $response_json = $this->client->sendRequest();
           
           if ($response_json)
           {
              $response_array = json_decode($response_json, true);

              $status=$response_array['status'];
              $totalResults=$response_array['totalResults'];

              $log=New Logs();
              $log->url=$this->client->buildUrl();
              $log->category=$this->client->getCategory();
              $log->country=$this->client->getCountry();
              $log->status=$status;
              $log->totalResults=$totalResults;
              $log->jsonRaw=$response_json;
              $log->save();

              for ($i=0; $i < sizeof($response_array['articles']); $i++) { 
                  $news=New News();
                  $news->title=$response_array['articles'][$i]['title'];
                  $news->author=$response_array['articles'][$i]['author'];
                  $news->description=$response_array['articles'][$i]['description'];
                  $news->country=$this->client->getCountry();
                  $news->category=$this->client->getCategory();
                  $news->url=$response_array['articles'][$i]['url'];
                  $news->urlToImage=$response_array['articles'][$i]['urlToImage'];
                  $news->publishedAt=date("Y-m-d H:i:s", strtotime($response_array['articles'][$i]['publishedAt']));
                  $news->save();
              }
           }
         }
      }  
}
