<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('userID') ?></th>
                    <th><?= $this->Paginator->sort('userName') ?></th>
                    <th><?= $this->Paginator->sort('userPassword') ?></th>
                    <th><?= $this->Paginator->sort('isAdmin') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->userID) ?></td>
                    <td><?= h($user->userName) ?></td>
                    <td><?= h($user->userPassword) ?></td>
                    <td><?= h($user->isAdmin) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->userID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->userID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->userID], ['confirm' => __('Are you sure you want to delete # {0}?', $user->userID)]) ?>
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