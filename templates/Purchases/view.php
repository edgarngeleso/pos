<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Purchase'), ['action' => 'edit', $purchase->purchaseID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Purchase'), ['action' => 'delete', $purchase->purchaseID], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->purchaseID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Purchases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Purchase'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchases view content">
            <h3><?= h($purchase->purchaseID) ?></h3>
            <table>
                <tr>
                    <th><?= __('PurchaseItems') ?></th>
                    <td><?= h($purchase->purchaseItems) ?></td>
                </tr>
                <tr>
                    <th><?= __('PurchaseID') ?></th>
                    <td><?= $this->Number->format($purchase->purchaseID) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
