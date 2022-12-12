<?php

namespace App\API;

use App\Exceptions\FuckjoniException;
use Symfony\Component\HttpClient\HttpClient;

class Client
{
    static public function getResponse(string $url)
    {
        $client = HttpClient::create();
        $response = $client->request('GET', $url);
        $statusCode = $response->getStatusCode();
        $content = $response->toArray();
        if($statusCode !== 200) {
            throw new FuckjoniException("Impossible d'accèder à l'API LoL");
        }
        return $content;
    }

    public function noResponseAPI(string $url)
    {
        return 'test';
    }
}
