<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateChampionsTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('champions');
        $table->addColumn('name', 'string')
            ->addColumn('score', 'integer')
            ->create()
        ;
    }
}
