<?php

declare(strict_types=1);

namespace App\Models;

use App\Dto\Role as DtoRole;
use Database\Connection;

class Role extends Connection
{
    public function store(DtoRole $role): int
    {
        $sql = 'INSERT INTO roles (name) VALUES (:name) ON DUPLICATE KEY UPDATE name = :name';
        $query = $this->connection->prepare($sql);
        $query->bindValue(':name', $role->getName(), \PDO::PARAM_STR);
        $query->execute();

        return (int) $this->connection->lastInsertId();
    }

    public function get(string $name): array
    {
        $sql = 'SELECT * FROM roles WHERE name = :name';
        $query = $this->connection->prepare($sql);
        $query->bindValue(':name', $name, \PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }
}
