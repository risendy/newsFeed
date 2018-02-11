<?php
namespace App\Http\Controllers\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Logs as Logs;

class LogsRepository
{
  public function createNewLog($array)
  {
     $log=New Logs();
     $log->url=$array['url'];
     $log->category=$array['category'];
     $log->country=$array['country'];
     $log->status=$array['status'];
     $log->totalResults=$array['totalResults'];
     $log->jsonRaw=$array['jsonRaw'];
     $log->save();
  }

  public function getMostRecent($number)
  {
     return News::orderBy('publishedAt', 'desc')->take($number)->get();
  }
}
