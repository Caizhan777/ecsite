<?php
use Migrations\AbstractMigration;

class CreatemtbOrderStatus extends AbstractMigration
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
        $table = $this->table('mtb_order_status');
        $table->addColumn('status_name', 'string', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
