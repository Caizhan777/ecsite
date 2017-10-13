<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>

<div class="orders index large-9 medium-8 columns content">
    <h3><?= __('注文リスト') ?></h3>
    <table cellpadding="0" cellspacing="0">
           <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->id) ?></td>
                <td><?= $order->has('user') ? $this->Html->link($order->user->user_name, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
                <td><?= h($order->order_address) ?></td>
                <td><?= h($order->order_tel) ?></td>
                <td><?= h($order->order_name) ?></td>
                <td><?= h($order->order_email) ?></td>
                <td><?= h($order->credit_code) ?></td>
                <td><?= h($order->created_datetime) ?></td>
                <td><?= h($order->updated_datetime) ?></td>
                <td><?= h($order->del_flg) ?></td>
                <td><?= h($order->buy_status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('詳細'), ['action' => 'OrderDetail', $order->id]) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $order->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
