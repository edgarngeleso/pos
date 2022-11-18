<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<div class=" edit-and-add-container">
    <?= $this->Form->create($addProduct,["type"=>"file"]) ?>
    <legend><?= __('Add Product') ?></legend>
    <label >Product image</label>
    <?= $this->Form->input("productImage",["type"=>"file","class"=>"image"]) ?>
    <label>Product name</label>
    <?= $this->Form->input("productName",["type"=>"text"]) ?>
    <label>Product buying price</label>
    <?= $this->Form->input("productBuyingPrice",["type"=>"number","class"=>"buying-price"]) ?>
    <label>Product selling price</label>
    <?= $this->Form->input("productSellingPrice",["type"=>"number","class"=>"selling-price"]) ?>
    <label>Product quantity</label>
    <?= $this->Form->input("productQuantity",["type"=>"number"]) ?>
    <label>Profit</label>
    <input type="text" disabled class="profit"/>
    <?= $this->Form->button(__('Add Product'),["class"=>"custom-button"]) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    let buyingPrice = document.querySelector(".buying-price");
    let sellingPrice = document.querySelector(".selling-price");
    let profit = document.querySelector(".profit");

    sellingPrice.addEventListener("input",(e)=>{
        profit.value = e.target.value-buyingPrice.value;
    })
</script>