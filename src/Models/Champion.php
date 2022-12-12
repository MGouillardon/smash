<?php

declare(strict_types=1);

namespace App\Models;

use Database\Connection;
use App\API\ChampionAPI;

class ChampionModel extends Connection
{
    public function storeChampion($name): void
    {
        $champion = new ChampionAPI();
        $championName = $champion->championToArray();
        foreach ($champion as $championName){
            $sql = "INSERT INTO champions (championName) VALUES ('$championName')";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':championName', $championName, \PDO::PARAM_STR);
            $query->execute();
        }
    }
}
