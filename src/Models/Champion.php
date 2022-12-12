<?php

declare(strict_types=1);

namespace App\Models;

use Database\Connection;
use App\Dto\Champion as DtoChampion;

class Champion extends Connection
{
    public function store(DtoChampion $champion): void
    {
        $sql = "INSERT INTO champions (name) VALUES (:name) ON DUPLICATE KEY UPDATE name = :name";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':name', $champion->getName(), \PDO::PARAM_STR);
        $query->execute();
    }
}
