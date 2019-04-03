<?php
namespace App\Http\Controllers\Interfaces;


use App\Http\Controllers\Controller;
use App\Http\Controllers\DTO\ApiDTO;

interface HttpClientInterface
{
	public function sendRequest($apiDTO);
}