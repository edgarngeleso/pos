<!-- $this->Html is the form helper object that contain code snippets for html elements like forms, links etc
link() method generate html link
-->
<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

//$this->disableAutoLayout();

?>


<h1>Topics</h1>
<p><?= $this->Html->link('Add Topic', ['action' => 'add_topic']) ?></p>
<table>
<tr>
<th>Id</th>
<th>Author</th>
<th>Topic name</th>
<th>View</th>
<th>Actions</th>
</tr>

<!-- Here's where we loop through our $topics query object, printing out topic info -->

<?php foreach ($topics as $topic): ?>
<tr>
    <td><?= $topic->topicID ?></td>
    <td>
        <?= $topic->topicAuthor ?>
    </td>
    <td>
        <?= $topic->topicName ?>
    </td>
    <td>
        <?= $this->Html->link($topic->topicName, ['action' => 'view_topic', $topic->topicID]) ?>
    </td>
    <td>
        <?= $this->Form->postLink(
        'Delete',
        ['action' => 'delete_topic', $topic->topicID],
        ['confirm' => 'Are you sure?'])
        ?>

        <?= $this->Html->link('Edit', ['action' => 'edit_topic', $topic->topicID]) ?>
    </td>
</tr>
<?php endforeach; ?>

</table>