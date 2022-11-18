<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Purchase> $purchases
 */
?>
<div class="purchases index content">
    <?= $this->Html->link(__('New Purchase'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Purchases') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('purchaseID') ?></th>
                    <th><?= $this->Paginator->sort('purchaseItems') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchases as $purchase): ?>
                <tr>
                    <td><?= $this->Number->format($purchase->purchaseID) ?></td>
                    <td><?= h($purchase->purchaseItems) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $purchase->purchaseID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchase->purchaseID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchase->purchaseID], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->purchaseID)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
