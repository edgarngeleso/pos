<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
    <!--<aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $editUser->userID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $editUser->userID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>-->
        <div class="edit-and-add-container">
            <?= $this->Form->create($editUser) ?>
                <legend><?= __("Edit user: {$editUser->userName}") ?></legend>
                <label>User name</label>
                <?=$this->Form->input('userName')?>
                <label>Password</label>
                <?php //$this->Form->input('userPassword')?>
                <input type="text" name="userPassword" required>

                <span>
                    <label>Is admin</label>
                    <?=$this->Form->input('isAdmin',["type"=>"checkbox"])?>
                </span>

            <?= $this->Form->button(__('Edit'),["class"=>'custom-button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
