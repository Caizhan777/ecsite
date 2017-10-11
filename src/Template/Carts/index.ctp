<h1>Order</h1>
<?= $this->Form->create(null,[
                  'url' => ['controller' => 'Orders', 'action' => 'index']]) ?>

<?= $this->Form->button('Order') ?>
<?= $this->Form->end() ?>
