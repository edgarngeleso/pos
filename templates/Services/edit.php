<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<div class="edit-and-add-container">
    <?= $this->Form->create($service,["type"=>"file"]) ?>
    <legend><?= __("Edit service: {$service->serviceName}") ?></legend>
    <label >Service image</label>
    <?= $this->Form->input("serviceImage",["type"=>"file","class"=>"image"]) ?>
    <label>Service name</label>
    <?= $this->Form->input("serviceName",["type"=>"text"]) ?>
    <?= $this->Form->button(__('Add Service'),["class"=>"custom-button"]) ?>
    <?= $this->Form->end() ?>
</div>