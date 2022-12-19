<?php

declare(strict_types=1);

namespace App\Dto;

final class Champion
{
    private string $name;
    private string $idName;
    private string $score;
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getIdName()
    {
        return $this->idName;
    }

    public function setIdName($idName)
    {
        $this->idName = $idName;

        return $this;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }
}
