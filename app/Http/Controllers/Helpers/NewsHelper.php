<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\HttpClientInterface;
use GuzzleHttp\Psr7\Request;

use App\Http\Controllers\Helpers\UrlHelper as UrlBuilder;

use App\Http\Controllers\Repositories\NewsRepository as NewsRepository;
use App\Http\Controllers\Repositories\LogsRepository as LogsRepository;

class NewsHelper extends Controller implements HttpClientInterface
{
    protected $client;
    protected $apiKey;
    /**
     * @var UrlHelper
     */
    private $urlHelper;
    /**
     * @var NewsRepository
     */
    private $newsRepository;
    /**
     * @var LogsRepository
     */
    private $logsRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HttpClientInterface $httpClientInterface, UrlHelper $urlHelper, NewsRepository $newsRepository, LogsRepository $logsRepository)
    {
        $this->client = $httpClientInterface;
        $this->urlHelper = $urlHelper;
        $this->newsRepository = $newsRepository;
        $this->logsRepository = $logsRepository;
    }

    public function processResult($response)
    {
        if ($response)
        {
           $arrayLog = $this->prepareNewLog($response);
           $this->logsRepository->createNewLog($arrayLog);

           for ($i=0; $i < sizeof($response['articles']); $i++) {
               $checkIfExists=$this->newsRepository->checkIfNewsExists($response['articles'][$i]['url']);

               if (!$checkIfExists)
               {
                 $arrayNews=$this->prepareNewNews($response, $i);
                 $this->newsRepository->createNewNews($arrayNews);
               }
           }
        }
    }

    public function processNews()
    {
        $categories = $this->urlHelper->getAvailbleCategories();

        for ($j=0; $j < sizeof($categories); $j++) { 
             $this->urlHelper->setCategory($categories[$j]);

             $response_json = $this->sendRequest($this->urlHelper);
             $this->processResult($response_json);
        }
    }

    public function sendRequest($urlHelper)
    {
        return $this->client->sendRequest($urlHelper);
    }

    private function prepareNewLog($responseArray) {

        $arrayLog=array(
            "url"=>$this->urlHelper->buildUrl(),
            "category"=>$this->urlHelper->getCategory(),
            "country"=>$this->urlHelper->getCountry(),
            "status"=>$responseArray['status'],
            "totalResults"=>$responseArray['totalResults']
        );

        return $arrayLog;
    }

    private function prepareNewNews($responseArray, $index) {

        $arrayNews=array(
            "title"=>$responseArray['articles'][$index]['title'],
            "author"=>$responseArray['articles'][$index]['author'],
            "description"=>$responseArray['articles'][$index]['description'],
            "country"=>$this->urlHelper->getCountry(),
            "category"=>$this->urlHelper->getCategory(),
            "url"=>$responseArray['articles'][$index]['url'],
            "urlToImage"=>$responseArray['articles'][$index]['urlToImage'],
            "publishedAt"=>date("Y-m-d H:i:s", strtotime($responseArray['articles'][$index]['publishedAt']))
        );

        return $arrayNews;
    }
}
