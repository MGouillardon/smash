<?php

declare(strict_types=1);

namespace App\Contracts;

interface HttpCall
{
    public function getEndpoint(): string;
    public function setEndpoint(string $endpoint): void;
    public function getMethod(): string;
    public function setMethod(string $method): void;
}
