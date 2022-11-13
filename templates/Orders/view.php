<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->orderID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->orderID], ['confirm' => __('Are you sure you want to delete # {0}?', $order->orderID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orders view content">
            <h3><?= h($order->orderID) ?></h3>
            <table>
                <tr>
                    <th><?= __('OrderID') ?></th>
                    <td><?= $this->Number->format($order->orderID) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('OrderString') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($order->orderString)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
