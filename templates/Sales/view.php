<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sale'), ['action' => 'edit', $sale->saleID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sale'), ['action' => 'delete', $sale->saleID], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->saleID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sale'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sales view content">
            <h3><?= h($sale->saleID) ?></h3>
            <table>
                <tr>
                    <th><?= __('SaleInvoiceNumber') ?></th>
                    <td><?= h($sale->saleInvoiceNumber) ?></td>
                </tr>
                <tr>
                    <th><?= __('SaleCashier') ?></th>
                    <td><?= h($sale->saleCashier) ?></td>
                </tr>
                <tr>
                    <th><?= __('SaleDate') ?></th>
                    <td><?= h($sale->saleDate) ?></td>
                </tr>
                <tr>
                    <th><?= __('SaleType') ?></th>
                    <td><?= h($sale->saleType) ?></td>
                </tr>
                <tr>
                    <th><?= __('SaleAmount') ?></th>
                    <td><?= h($sale->saleAmount) ?></td>
                </tr>
                <tr>
                    <th><?= __('SaleProfit') ?></th>
                    <td><?= h($sale->saleProfit) ?></td>
                </tr>
                <tr>
                    <th><?= __('SaleID') ?></th>
                    <td><?= $this->Number->format($sale->saleID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Balance') ?></th>
                    <td><?= $this->Number->format($sale->balance) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
