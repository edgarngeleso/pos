<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class=" edit-and-add-container">
    <?= $this->Form->create($product,["type"=>"file"]) ?>
    <legend><?= __("Edit {$product->productName}") ?></legend>
    <label >Product image</label>
    <?= $this->Form->input("productImage",["type"=>"file","class"=>"image"]) ?>
    <label>Product name</label>
    <?= $this->Form->input("productName",["type"=>"text"]) ?>
    <label>Product buying price</label>
    <?= $this->Form->input("productBuyingPrice",["type"=>"number"]) ?>
    <label>Product selling price</label>
    <?= $this->Form->input("productSellingPrice",["type"=>"number"]) ?>
    <label>Product quantity</label>
    <?= $this->Form->input("productQuantity",["type"=>"number"]) ?>
    <?= $this->Form->button(__('Edit Product'),["class"=>"custom-button"]) ?>
    <?= $this->Form->end() ?>
</div>