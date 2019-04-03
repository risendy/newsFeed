<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DTO\ApiDTO;
use App\Http\Controllers\Interfaces\HttpClientInterface;
use GuzzleHttp\Psr7\Request;
use App\Http\Controllers\Repositories\NewsRepository as NewsRepository;
use App\Http\Controllers\Repositories\LogsRepository as LogsRepository;

class NewsHelper extends Controller implements HttpClientInterface
{
    protected $client;
    protected $apiKey;
    /**
     * @var ApiDTO
     */
    private $apiDTO;
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
    public function __construct(HttpClientInterface $httpClientInterface, ApiDTO $apiDTO, NewsRepository $newsRepository, LogsRepository $logsRepository)
    {
        $this->client = $httpClientInterface;
        $this->apiDTO = $apiDTO;
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
        $categories = $this->apiDTO->getAvailbleCategories();

        for ($j=0; $j < sizeof($categories); $j++) { 
             $this->apiDTO->setCategory($categories[$j]);

             $response_json = $this->sendRequest($this->apiDTO);
             $this->processResult($response_json);
        }
    }

    public function sendRequest($apiDTO)
    {
        return $this->client->sendRequest($apiDTO);
    }

    private function prepareNewLog($responseArray) {

        $arrayLog=array(
            "url"=>$this->apiDTO->buildUrl(),
            "category"=>$this->apiDTO->getCategory(),
            "country"=>$this->apiDTO->getCountry(),
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
            "country"=>$this->apiDTO->getCountry(),
            "category"=>$this->apiDTO->getCategory(),
            "url"=>$responseArray['articles'][$index]['url'],
            "urlToImage"=>$responseArray['articles'][$index]['urlToImage'],
            "publishedAt"=>date("Y-m-d H:i:s", strtotime($responseArray['articles'][$index]['publishedAt']))
        );

        return $arrayNews;
    }
}
