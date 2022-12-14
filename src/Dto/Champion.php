<?php

declare(strict_types=1);

namespace App\Dto;

final class Champion
{
    private string $name;
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
