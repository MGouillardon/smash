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

    public function add()
    {
    }
}
