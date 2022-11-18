<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<div class="container">

    <h3><?= __('Products') ?></h3>

    <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <?php foreach ($products as $product): ?>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Free</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= h($product->productName) ?></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li><?= h($product->productName) ?></li>
                    <li><?= h($product->productName) ?></li>
                    </ul>

                    <!--
                    Only visible to admins

                    <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->productID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->productID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->productID], ['confirm' => __('Are you sure you want to delete # {0}?', $product->productID)]) ?>
                    </td>-->

                    <button type="button" class="w-100 btn btn-lg btn-outline-primary">Add</button>
                </div>
                </div>
                </div>
            <?php endforeach ?>
        
    </div>
        
    
</div>
