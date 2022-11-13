<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php

$this->disableAutoLayout();

?>

<h1> Add Topic</h1>

<?php
echo $this->Form->create($topic);
echo $this->Form->input('topicName');
echo $this->Form->input('topicAuthor');
echo $this->Form->button(__('Save Topic'));
echo $this->Form->end();
?>