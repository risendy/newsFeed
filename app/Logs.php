<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
	protected $fillable = array('url', 'category', 'country', 'status', 'totalResults');
    protected $table = 'logs';
    public $timestamps = true;

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update'; 
}
