<?php

namespace App\Champion;

use Database\Connection;
use App\Models\Champion as ChampionModel;
use App\Contracts\RandomChampion as RandomChampionInterface;

class RandomChampion extends Connection implements RandomChampionInterface
{
    private function countChampions(): int
    {
        $championModel = new ChampionModel();
        $countChampion = $championModel->count();
        return $countChampion;
    }

    private function randomChampionsId(int $countChampion): int
    {
        return random_int(0, $countChampion -1);
    }
    private function getRandomChampion(): array
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
            $this->getTwoChampions();
        }

        return [$firstChampion['name'], $secondChampion['name']];
    }
}
