<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sale> $sales
 */
?>
<div class="sales index content">
    <?= $this->Html->link(__('New Sale'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sales') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('saleID') ?></th>
                    <th><?= $this->Paginator->sort('saleInvoiceNumber') ?></th>
                    <th><?= $this->Paginator->sort('saleCashier') ?></th>
                    <th><?= $this->Paginator->sort('saleDate') ?></th>
                    <th><?= $this->Paginator->sort('saleType') ?></th>
                    <th><?= $this->Paginator->sort('saleAmount') ?></th>
                    <th><?= $this->Paginator->sort('saleProfit') ?></th>
                    <th><?= $this->Paginator->sort('balance') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $sale): ?>
                <tr>
                    <td><?= $this->Number->format($sale->saleID) ?></td>
                    <td><?= h($sale->saleInvoiceNumber) ?></td>
                    <td><?= h($sale->saleCashier) ?></td>
                    <td><?= h($sale->saleDate) ?></td>
                    <td><?= h($sale->saleType) ?></td>
                    <td><?= h($sale->saleAmount) ?></td>
                    <td><?= h($sale->saleProfit) ?></td>
                    <td><?= $this->Number->format($sale->balance) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sale->saleID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sale->saleID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sale->saleID], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->saleID)]) ?>
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
