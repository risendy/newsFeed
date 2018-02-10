<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $fillable = array('author', 'title', 'description', 'url', 'urlToImage', 'country', 'category', 'publishedAt');

    protected $table = 'news';
    public $timestamps = true;

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';    
}
