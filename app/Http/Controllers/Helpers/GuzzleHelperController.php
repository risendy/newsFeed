<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request;

use App\Http\Controllers\Helpers\UrlHelper as UrlBuilder;

use App\Http\Controllers\Repositories\NewsRepository as NewsRepository;
use App\Http\Controllers\Repositories\LogsRepository as LogsRepository;

class GuzzleHelperController extends Controller
{
    protected $client;
    protected $urlHelper;
    protected $apiKey;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
        $this->urlHelper = new UrlBuilder;

        $this->apiKey=$_ENV['NEWS_FEED_APIKEY'];
    }

    public function processResult($response_json)
    {
        $newsRepository=new NewsRepository();
        $logsRepository=new LogsRepository();

        if ($response_json)
        {
           $response_array = json_decode($response_json, true);

           $arrayLog=array(
             "url"=>$this->urlHelper->buildUrl(),
             "category"=>$this->urlHelper->getCategory(),
             "country"=>$this->urlHelper->getCountry(),
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
                   "country"=>$this->urlHelper->getCountry(),
                   "category"=>$this->urlHelper->getCategory(),
                   "url"=>$response_array['articles'][$i]['url'],
                   "urlToImage"=>$response_array['articles'][$i]['urlToImage'],
                   "publishedAt"=>date("Y-m-d H:i:s", strtotime($response_array['articles'][$i]['publishedAt']))
                 );

                 $newsRepository->createNewNews($arrayNews);
               }
               
           }
        }
    }

    public function processNews()
    {
        $categories = $this->urlHelper->getAvailbleCategories();

        for ($j=0; $j < sizeof($categories); $j++) { 
          $this->urlHelper->setCategory($categories[$j]);

             $response_json = $this->sendRequest();

          $this->processResult($response_json); 
        }
    }

    public function sendRequest()
    {
        return $this->client->request('GET', $this->urlHelper->buildUrl(), [
        'verify'=> false,
        'headers' => [
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
            'Authorization'      => $this->apiKey
        ]
        ])->getBody()->getContents();
    }  
}
