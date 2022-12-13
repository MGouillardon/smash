<?php

declare(strict_types=1);

namespace App\Dto;

final class Role
{
    private string $name;
    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }
}
