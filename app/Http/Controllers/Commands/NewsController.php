<?php

namespace App\Http\Controllers\Commands;

use App;
use App\Http\Controllers\Controller;
use App\News as News;
use App\Logs as Logs;
use App\Http\Controllers\Helpers\GuzzleHelperController as GuzzleHelper;

use App\Http\Controllers\Repositories\NewsRepository as NewsRepository;
use App\Http\Controllers\Repositories\LogsRepository as LogsRepository;

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

         $newsRepository=new NewsRepository();
         $logsRepository=new LogsRepository();

         $categories = $this->client->getAvailbleCategories();

         for ($j=0; $j < sizeof($categories); $j++) { 
           $this->client->setCategory($categories[$j]);

           $response_json = $this->client->sendRequest();
           
           if ($response_json)
           {
              $response_array = json_decode($response_json, true);

              $arrayLog=array(
                "url"=>$this->client->buildUrl(),
                "category"=>$this->client->getCategory(),
                "country"=>$this->client->getCountry(),
                "status"=>$response_array['status'],
                "totalResults"=>$response_array['totalResults']
              );

              $logsRepository->createNewLog($arrayLog);

              for ($i=0; $i < sizeof($response_array['articles']); $i++) {
                  $checkIfExists=$newsRepository->checkIfNewsExists($response_array['articles'][$i]['url']);

                  if (!$checkIfExists)
                  {
                    $arrayNews=array(
                      "title"=>$response_array['articles'][$i]['title'],
                      "author"=>$response_array['articles'][$i]['author'],
                      "description"=>$response_array['articles'][$i]['description'],
                      "country"=>$this->client->getCountry(),
                      "category"=>$this->client->getCategory(),
                      "url"=>$response_array['articles'][$i]['url'],
                      "urlToImage"=>$response_array['articles'][$i]['urlToImage'],
                      "publishedAt"=>date("Y-m-d H:i:s", strtotime($response_array['articles'][$i]['publishedAt']))
                    );

                    $newsRepository->createNewNews($arrayNews);
                  }
                  
              }
           }
         }
      }  
}
