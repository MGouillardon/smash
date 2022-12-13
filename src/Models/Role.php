<?php

declare(strict_types=1);

namespace App\Models;

use Database\Connection;
use App\Dto\Role as DtoRole;

class Role extends Connection
{
    public function store(DtoRole $role): int
    {
        $sql = "INSERT INTO roles (name) VALUES (:name) ON DUPLICATE KEY UPDATE name = :name";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':name', $role->getName(), \PDO::PARAM_STR);
        $query->execute();

        return (int) $this->connection->lastInsertId();
    }
}
