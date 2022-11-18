<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <!--<aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $viewuser->userID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $viewuser->userID], ['confirm' => __('Are you sure you want to delete # {0}?', $user->userID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>-->
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3>Profile</h3>
            <table>
                <tr>
                    <th><?= __('UserName') ?></th>
                    <td><?= h($viewuser->userName) ?></td>
</tr>
                <tr>
                    <th><?= __('UserID') ?></th>
                    <td><?= $this->Number->format($viewuser->userID) ?></td>
                </tr>
                <tr>
                    <th><?= __('IsAdmin') ?></th>
                    <td><?= $viewuser->isAdmin ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
