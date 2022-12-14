<?php

declare(strict_types=1);

namespace App\Models;

use App\Dto\Champion as DtoChampion;
use App\Dto\Role as DtoRole;
use Database\Connection;

class Champion extends Connection
{
    public function store(DtoChampion $champion): int
    {
        $sql = 'INSERT INTO champions (name, id_name) VALUES (:name, :id_name) ON DUPLICATE KEY UPDATE name = :name';
        $query = $this->connection->prepare($sql);
        $query->bindValue(':name', $champion->getName(), \PDO::PARAM_STR);
        $query->bindValue(':id_name', $champion->getIdName(), \PDO::PARAM_STR);
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

    public function getChampion(int $randomChampion): array|bool
    {
        $sql = 'SELECT name, id_name FROM champions LIMIT :randomChampion , 1';
        $query = $this->connection->prepare($sql);
        $query->bindValue(':randomChampion', $randomChampion, \PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch();

        return $result;
    }

    public function updateScore(DtoChampion $champion): void
    {
        $sql = 'UPDATE champions SET score = score + 1 WHERE id_name = :id_name';
        $query = $this->connection->prepare($sql);
        $query->bindValue(':id_name', $champion->getIdName(), \PDO::PARAM_STR);
        $query->execute();
    }

    public function getTopChampions(): array
    {
        $sql = 'SELECT name, score FROM champions ORDER BY score DESC LIMIT 10';
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();

        return $result;
    }

    public function getTopChampionsByRole(DtoRole $role): array
    {
        $sql = 'SELECT c.name, c.score, r.name role FROM champions AS c
        JOIN champion_role AS cr ON c.id = cr.champion_id 
        JOIN roles AS r ON r.id = cr.role_id
        WHERE r.name = :role
        ORDER BY score DESC
        LIMIT 10';
        $query = $this->connection->prepare($sql);
        $query->bindValue(':role', $role->getName(), \PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll();

        return $result;
    }
}
