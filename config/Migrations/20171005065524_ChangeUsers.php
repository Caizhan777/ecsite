<?php
use Migrations\AbstractMigration;

class ChangeUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
      $table = $this->table('users');

      $table->changeColumn('created', 'datetime', [
          'default' => 'CURRENT_TIMESTAMP',
      ]);
      $table->changeColumn('updated', 'datetime', [
          'default' => 'CURRENT_TIMESTAMP',
      ]);


      $table->changeColumn('del_flg', 'boolean', [
          'default' => 0,
          'null' => false,
      ]);
      $table->addColumn('level', 'boolean', [
          'default' => 0,
          'null' => false,
      ]);
      $table->addIndex(['user_email'], ['unique' => true]);

      $table->update();
    }
}
