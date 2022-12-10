<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class RolesTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('roles');
        $table->addColumn('name', 'string')
            ->create()
        ;
    }
}
