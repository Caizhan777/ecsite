<?php

use Migrations\AbstractMigration;

class OrderDetail extends AbstractMigration {

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change() {
        $table = $this->table('order_detail');
        $table->addColumn('order_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('product_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('product_name', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('product_num', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('product_price', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('product_img', 'string', [
            'default' => null,
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
