<?php

namespace App\Http\Controllers\Commands;

use App;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\NewsHelper;

class NewsController extends Controller
{
    protected $client;
    private $httpHelper;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NewsHelper $httpHelper)
    {
        $this->httpHelper = $httpHelper;
    }

    public function getNews()
    {
         /*if ($_SERVER['HTTP_USER_AGENT'] != '3215523')
         {
            echo "Error.";
            exit;
         }*/

         try {
             $this->httpHelper->processNews();
             echo "success";
         } catch (\Exception $e) {
             echo "Error message: ".$e->getMessage();
         }

      }  
}
