<h1>Product</h1>
<?= $this->Form->create(null,[
                  'url' => ['controller' => 'Carts', 'action' => 'index']]) ?>

<?= $this->Form->button('Cart') ?>
<?= $this->Form->end() ?>
