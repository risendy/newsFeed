<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;

class UrlHelper extends Controller
{
    protected $client;
    protected $url_core='https://newsapi.org/v2/';

    protected $country='us';

    protected $category='general';

    protected $type='top-headlines';
    protected $availbleCategories=array("business", "entertainment", "general", "health", "science", "sports", "technology");

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function buildUrl()
    {
        return $this->url_core.$this->type.'?'.'country='.$this->country.'&'.'category='.$this->category;
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

    public function getAvailbleCategories() {
        return $this->availbleCategories;
    }
    //
}
