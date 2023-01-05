<?php

namespace App\Contracts;

interface StoreChampion
{
    public function index(): array;
    public function store(): void;
}
