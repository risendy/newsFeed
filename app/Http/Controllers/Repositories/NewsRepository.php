<?php
namespace App\Http\Controllers\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\News as News;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsRepository
{
  public function getHeadlines($category, $number)
  {
   return News::where('urlToImage', '<>', '', 'and')->where('category', $category)->orderBy('publishedAt', 'desc')->paginate($number);
 }

 public function getMostRecent($number)
 {
   return News::orderBy('publishedAt', 'desc')->take($number)->get();
 }

 public function checkIfNewsExists($url)
 {
   return News::where('url', $url)->first();
 }

 public function createNewNews($array)
 {
   $news=New News();
   $news->title=$array['title'];
   $news->author=$array['author'];
   $news->description=$array['description'];
   $news->country=$array['country'];
   $news->category=$array['category'];
   $news->url=$array['url'];
   $news->urlToImage=$array['urlToImage'];
   $news->publishedAt=$array['publishedAt'];
   $news->save();
 }

 public function searchNews($findNews)
 {
   $findNews=strtolower($findNews);
   
   return  DB::table('news')->where( function ( $q2 ) use ( $findNews ) {
      $q2->whereRaw( 'LOWER(`title`) like ?', array('%'.$findNews.'%'));
      $q2->orWhereRaw( 'LOWER(`description`) like ?', array('%'.$findNews.'%'));
   })->paginate(20);
 }

 public function removeOldNews($days)
 {
   return News::where('creation_date', '<=', Carbon::now()->subDays($days)->toDateTimeString())->delete();
 }

}
