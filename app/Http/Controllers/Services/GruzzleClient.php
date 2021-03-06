<?php
/**
 * Created by PhpStorm.
 * User: Kuba
 * Date: 2019-04-03
 * Time: 17:41
 */

namespace App\Http\Controllers\Services;


use App\Http\Controllers\DTO\ApiDTO;
use App\Http\Controllers\Interfaces\HttpClientInterface;
use GuzzleHttp\Client;

class GruzzleClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    private $client;
    /**
     * @var ApiDTO
     */
    private $apiKey;

    public function __construct(Client $client, $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    public function sendRequest($apiDTO)
    {
        $response =  $this->client->request('GET', $apiDTO->buildUrl(), [
            'verify'=> false,
            'headers' => [
                'Accept' => 'application/json',
                'Content-type' => 'application/json',
                'Authorization'      => $this->apiKey
            ]
        ])->getBody()->getContents();

        return json_decode($response, true);
    }
}