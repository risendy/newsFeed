<?php
namespace App\Http\Controllers\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\News as News;

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
}
