<?php

namespace App\Champion;

use Database\Connection;
use App\Models\Champion as ChampionModel;
use App\Contracts\RandomChampion as RandomChampionInterface;

class RandomChampion extends Connection implements RandomChampionInterface
{
    public function countChampions(): int
    {
        $championModel = new ChampionModel();
        $countChampion = $championModel->count();
        return $countChampion;
    }

    public function randomChampionsId(int $countChampion): int
    {
        return random_int(1, $countChampion);
    }
    public function getRandomChampion(): array
    {
        $countChampions = $this->countChampions();
        $randomChampion = $this->randomChampionsId($countChampions);
        $championModel = new ChampionModel();
        $getRandomChampion = $championModel->getChampion($randomChampion);
        return $getRandomChampion;
    }

    public function getTwoChampions(): array
    {
        $firstChampion = $this->getRandomChampion();
        $secondChampion = $this->getRandomChampion();
        if ($firstChampion === $secondChampion) {
            $firstChampion = $this->getRandomChampion();
        }
        dd($firstChampion, $secondChampion);
        return [$firstChampion, $secondChampion];
    }
}
