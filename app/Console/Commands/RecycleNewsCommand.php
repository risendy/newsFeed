<?php

namespace App\Console\Commands;

use App\Http\Controllers\Services\RecycleService as RecycleService;
use App;
use Illuminate\Console\Command;

class RecycleNewsCommand extends Command
{
    protected $recycleService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recycle:news {days=7}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recycle news older than 3 days';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->recycleService=new RecycleService();
    }

    public function handle()
    {
         /*if ($_SERVER['HTTP_USER_AGENT'] != '3215523')
         {
            echo "Error";
            exit;
         }*/

        $days = $this->argument('days');

        try {
            $this->recycleService->removeOldNews($days);
            echo "Success";
        } catch (\Exception $e) {
            echo "Error message: ".$e->getMessage();
        }

      }  
}
