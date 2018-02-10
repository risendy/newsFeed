<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request;

class GuzzleHelperController extends Controller
{
    protected $client;
    protected $apiKey;
    protected $url_core='https://newsapi.org/v2/';

    protected $country='us';
    protected $category='general';
    protected $type='top-headlines';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
        $this->apiKey=$_ENV['NEWS_FEED_APIKEY'];
    }

    public function buildUrl()
    {
        return $this->url_core.$this->type.'?'.'country='.$this->country.'&'.'category='.$this->category;
    }

    public function sendRequest()
    {
        return $this->client->request('GET', $this->buildUrl(), [
        'verify'=> false,
        'headers' => [
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
            'Authorization'      => $this->apiKey
        ]
        ])->getBody()->getContents();
    }  

    public function getCountry() {
        return $this->country;
    }
    public function setCountry($country) {
        $this->country = $country;
    } 

    public function getCategory() {
        return $this->category;
    }
    public function setCategory($category) {
        $this->category = $category;
    }

    public function getType() {
        return $this->type;
    }
    public function setType($type) {
        $this->type = $type;
    }
    //
}
