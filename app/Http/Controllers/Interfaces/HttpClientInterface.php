<?php
namespace App\Http\Controllers\Interfaces;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\UrlHelper;

interface HttpClientInterface
{
	public function sendRequest($urlHelper);
}