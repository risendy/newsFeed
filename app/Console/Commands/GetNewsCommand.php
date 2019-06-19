<?php

namespace App\Console\Commands;

use App;
use App\Http\Controllers\Helpers\NewsHelper;
use Illuminate\Console\Command;

class GetNewsCommand extends Command
{
    protected $client;
    private $httpHelper;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch news from API';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NewsHelper $httpHelper)
    {
        parent::__construct();

        $this->httpHelper = $httpHelper;
    }

    public function handle()
    {
         /*if ($_SERVER['HTTP_USER_AGENT'] != '3215523')
         {
            echo "Error.";
            exit;
         }*/

         try {
             $this->httpHelper->processNews();
             echo "Success";
         } catch (\Exception $e) {
             echo "Error message: ".$e->getMessage();
         }

      }  
}
