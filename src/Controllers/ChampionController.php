<?php

namespace App\Controllers;

use App\Champion\RandomChampion;

class ChampionController
{
    public function duel()
    {
        $champions = new RandomChampion();

        return json_encode($champions->getTwoChampions());
    }

    public function addScore()
    {
        $champion = $_GET['id'];
        // var_dump($champion);
        return $champion;
    }
}
