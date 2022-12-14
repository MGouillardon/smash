<?php 

namespace App\Contracts;

interface Champion 
{
    public function index(): array;
    public function store(): void;
    
}