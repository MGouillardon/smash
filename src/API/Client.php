<?php

declare(strict_types=1);

namespace App\API;

use App\Exceptions\FuckjoniException;
use Symfony\Component\HttpClient\HttpClient;

class Client
{
    public static function getResponse(string $url)
    {
        $client = HttpClient::create();
        $response = $client->request('GET', $url);
        $statusCode = $response->getStatusCode();
        $content = $response->toArray();
        if ($statusCode !== 200) {
            throw new FuckjoniException("Vivement le 23");
        }
        return $content;
    }

}
