<?php

declare(strict_types=1);

namespace App\Dto;

final class Role
{
    private string $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }
}
