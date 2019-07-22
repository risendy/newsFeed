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

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->where('parent_id', NULL);
    }

    public function commentsCount()
    {
        return $this->hasMany(Comment::class)->count();
    }
}
