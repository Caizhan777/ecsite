<div class="books view large-9 medium-8 columns content">
    <h3><?= h($product->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Books Name') ?></th>
            <td><?= h($product->product_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Book Writer') ?></th>
            <td><?= h($product->product_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Book Price') ?></th>
            <td><?= h($product->product_num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Book Introduce') ?></th>
            <td><?= h($product->product_img) ?></td>
        </tr>
    </table>
</div>
<div class="products form large-9 medium-8 columns content">
  <?= $this->Form->create($product, [
    'type'=>'post',
    'url'=> [
      "controller" => "Products",
      "action" => "view",
      $product->id
    ]
  ]);?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php

            echo $this->Form->hidden('id', ['value' => $product->id]);
            echo $this->Form->control('product_num');

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
