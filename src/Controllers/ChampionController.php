<?php

namespace App\Controllers;

use App\Champion\RandomChampion;
use Database\Connection;
use App\Dto\Champion as DtoChampion;
use App\Models\Champion as ChampionModel;

class ChampionController extends Connection
{
    public function duel()
    {
        $champions = new RandomChampion();

        return json_encode($champions->getTwoChampions());
    }

    public function addScore()
    {
        $champion = $_GET['id'];
        $dtoChampion = new DtoChampion();
        $dtoChampion->setIdName($champion);
        $championModel = new ChampionModel();
        $championModel->updateScore($dtoChampion);
        header('Location: /');
        exit;
    }
}
