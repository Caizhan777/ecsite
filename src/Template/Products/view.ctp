
<div class="products form large-9 medium-8 columns content">
  <?= $this->Form->create($product, [
    'type'=>'post',
    'url'=> [
      "controller" => "Products",
      "action" => "view"
    ]
  ]);?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php
            echo $this->Form->control('product_name');
            echo $this->Form->control('product_price');
            echo $this->Form->control('product_num');
            echo $this->Form->control('product_img');
            echo $this->Form->control('del_flg');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
