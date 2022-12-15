<?php

declare(strict_types=1);

namespace App\Models;

use App\Dto\Champion as DtoChampion;
use Database\Connection;

class Champion extends Connection
{
    public function store(DtoChampion $champion): int
    {
        $sql = 'INSERT INTO champions (name) VALUES (:name) ON DUPLICATE KEY UPDATE name = :name';
        $query = $this->connection->prepare($sql);
        $query->bindValue(':name', $champion->getName(), \PDO::PARAM_STR);
        $query->execute();

        return (int) $this->connection->lastInsertId();
    }

    public function associateTag(int $championId, int $tagId): void
    {
        $sql = 'INSERT INTO champion_role (champion_id, role_id) VALUES (:championId, :tagId)';
        $query = $this->connection->prepare($sql);
        $query->bindValue(':championId', $championId, \PDO::PARAM_INT);
        $query->bindValue(':tagId', $tagId, \PDO::PARAM_INT);
        $query->execute();
    }

    public function count(): int
    {
        $sql = 'SELECT COUNT(*) FROM champions';
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchColumn();

        return (int) $result;
    }

    public function getChampion(int $randomChampionId): array|bool
    {
        $sql = 'SELECT * FROM champions WHERE id = :randomChampionId';
        $query = $this->connection->prepare($sql);
        $query->bindValue(':randomChampionId', $randomChampionId, \PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch();

        return $result;
    }
}
