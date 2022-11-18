<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
        <div class="edit-and-add-container">
            <?= $this->Form->create($addUser) ?>
            <legend><?= __('Add User') ?></legend>
            <label>User name</label>
            <?=$this->Form->input('userName')?>
            <label>Password</label>
            <?=$this->Form->input('userPassword')?>

            <span>
                <label>Is admin</label>
                <?=$this->Form->checkbox('isAdmin')?>
            </span>
                
            <?= $this->Form->button(__('Add user'),["class"=>"custom-button"]) ?>
            <?= $this->Form->end() ?>
        </div>
