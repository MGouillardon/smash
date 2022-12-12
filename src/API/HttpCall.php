<?php

namespace App\Api;

use App\Contracts\HttpCall as HttpCallInterface;

final class HttpCall implements HttpCallInterface
{

    public function __construct(private string $endpoint, private string $method = 'GET')
    {
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function setEndpoint(string $endpoint): void
    {
        $this->endpoint = $endpoint;
    }
    public function getMethod(): string
    {
        return $this->method;
    }
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }
}
