<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ChampionRoleRelationnalTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('champion_role',['id' => false, 'primary_key' => ['champion_id', 'role_id']]);
        $table->addColumn('role_id', 'integer', ['null' => false, 'signed' => false])
              ->addColumn('champion_id', 'integer', ['null' => false, 'signed' => false])
              ->addForeignKey('champion_id', 'champions', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
              ->addForeignKey('role_id', 'roles', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
              ->create();
    }
}
