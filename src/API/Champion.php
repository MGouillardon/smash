<?php

namespace App\Api;

use Database\Connection;
use App\Models\Champion as ChampionModel;
use App\Contracts\Champion as ChampionInterface;


class Champion extends Connection implements ChampionInterface
{
    public function countChampionsId(): int
    {
        $championModel = new ChampionModel();
        $countChampionId = $championModel->count();
        dd($countChampionId);
        return $countChampionId;
    }
}