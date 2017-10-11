<?php
use Migrations\AbstractMigration;

class CreateOrder extends AbstractMigration
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
        $table = $this->table('Order');
        $table->addColumn('user_id', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('order_address', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('order_tel', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('order_name', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('order_email', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('katto', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created_datetime', 'datetime', [
            'default' => null,
            'null' => false,

        ]);
        $table->addColumn('updated_datetime', 'datetime', [
            'default' => CURRENT_TIMESTAMP,
            'null' => false,

        ]);
        $table->addColumn('del_flg', 'string', [
            'default' => 0,
            'null' => false,
            
        ]);
        $table->addColumn('buy_status', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
