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
    public function getRandomChampion()
    {
        $countChampions = $this->countChampions();
        $randomChampionId = $this->randomChampionsId($countChampions);
        $championModel = new ChampionModel();
        $getRandomChampion = $championModel->getChampion($randomChampionId);

        return $getRandomChampion;
    }
}
