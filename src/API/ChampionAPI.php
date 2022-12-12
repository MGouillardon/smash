<?php

declare(strict_types=1);

namespace App\API;

use App\Exceptions\FuckjoniException;

class ChampionAPI
{
    public function getChampions()
    {
        try {
            $API = Client::getResponse('http://ddragon.leagueoflegends.com/cdn/12.23.1/data/en_US/champion.json');
        } catch (FuckjoniException $e) {
            $e->getMessage();
        }
        return $API;
    }

    public function championToArray()
    {
        $championAPI = $this->getChampions();
        $data = $championAPI['data'];
        $champions = array_keys($data);
        return $champions;
    }
}
