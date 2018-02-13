<?php

namespace App\Http\Controllers\Commands;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\RecycleService as RecycleService;
use App;

class RecycleController extends Controller
{
    protected $recycleService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->recycleService=new RecycleService();
    }

    public function recycleNews()
    {
         if ($_SERVER['HTTP_USER_AGENT'] != '3215523')
         {
            echo "Error";
            exit;
         }

         $this->recycleService->removeOldNews();
      }  
}
