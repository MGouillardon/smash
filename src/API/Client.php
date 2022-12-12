<?php

namespace App\API;

use Symfony\Component\HttpClient\HttpClient;

class Client
{

    public function getResponse()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://ddragon.leagueoflegends.com/cdn/12.23.1/data/en_US/champion.json');
        // $statusCode = $response->getStatusCode();
        // $contentType = $response->getHeaders()['content-type'][0];
        // $content = $response->getContent();
        $content = $response->toArray();
        return $content;

    }

}
