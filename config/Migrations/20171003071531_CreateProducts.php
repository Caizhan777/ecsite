<?php
use Migrations\AbstractMigration;

class CreateProducts extends AbstractMigration
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
      $table = $this->table('products');
      $table->addColumn('product_name', 'string', [
          'default' => null,
          'limit' => 255,
          'null' => false,
      ]);
        $table->addColumn('product_price', 'integer', [
          'default' => null,
          'null' => false,
      ]);
      $table->addColumn('product_num', 'integer', [
          'default' => null,
          'null' => false,
      ]);
      $table->addColumn('product_img', 'string', [
          'limit' => 255,
          'null' => false,
      ]);
      $table->addColumn('created', 'datetime', [
          'default' => null,
          'null' => false,
      ]);
      $table->addColumn('updated', 'datetime', [
          'default' => null,
          'null' => false,
      ]);
      $table->addColumn('del_flg', 'integer', [
          'default' => 0,
          'null' => false,
      ]);
      $table->create();
    }
}
