<?php

namespace App\Champion;

use Database\Connection;
use App\Models\Champion as ChampionModel;
use App\Contracts\RandomChampion as RandomChampionInterface;

class RandomChampion extends Connection implements RandomChampionInterface
{
    public function countChampionsId(): int
    {
        $championModel = new ChampionModel();
        $countChampionId = $championModel->count();
        return $countChampionId;
    }

    public function randomChampionsId(int $countChampionId): int
    {
        $countChampionId = $this->countChampionsId();
        return random_int(1, $countChampionId);
    }
    public function getRandomChampion(int $randomChampionId)
    {
        $championModel = new ChampionModel();
        $getRandomChampion = $championModel->getChampion($randomChampionId);
        var_dump($getRandomChampion);
        return $getRandomChampion;
    }
}
