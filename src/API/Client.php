<?php

declare(strict_types=1);

namespace App\Api;

use App\Contracts\HttpCall;
use App\Exceptions\ApiException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;

class Client
{
    public static function call(HttpCall $httpCall)
    {
        $client = HttpClient::create();

        try {
            $response = $client->request($httpCall->getMethod(), $httpCall->getEndpoint());
            $content = $response->toArray();
        } catch (HttpExceptionInterface $e) {
            throw new ApiException($e->getMessage());
        }

        return $content;
    }
}
