<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\News as News;
use App\Http\Controllers\Helpers\GuzzleHelperController as GuzzleHelper;

class NewsController extends Controller
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

    public function getNews()
    {
       $newClient=New GuzzleHelper();
       $response_json = $newClient->sendRequest();
       $response_array = json_decode($response_json, true);

       for ($i=0; $i < sizeof($response_array['articles']); $i++) { 
           $news=New News();
           $news->title=$response_array['articles'][$i]['title'];
           $news->author=$response_array['articles'][$i]['author'];
           $news->description=$response_array['articles'][$i]['description'];
           $news->country=$newClient->getCountry();
           $news->category=$newClient->getCategory();
           $news->url=$response_array['articles'][$i]['url'];
           $news->urlToImage=$response_array['articles'][$i]['urlToImage'];
           $news->publishedAt=date("Y-m-d H:i:s", strtotime($response_array['articles'][$i]['publishedAt']));
           $news->save();
       }
    }   

    //
}
