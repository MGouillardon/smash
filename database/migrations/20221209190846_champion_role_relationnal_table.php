<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ChampionRoleRelationnalTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('champion_role', ['id' => false, 'primary_key' => ['champion_id', 'role_id']]);
        $table->addColumn('role_id', 'integer', ['null' => false, 'signed' => false])
            ->addColumn('champion_id', 'integer', ['null' => false, 'signed' => false])
            ->addForeignKey('champion_id', 'champions', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('role_id', 'roles', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create()
        ;
    }
}
