<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php

$this->disableAutoLayout();

?>

<h1>Edit Topic</h1>
<?php
echo $this->Form->create($topic);
echo $this->Form->input('topicName',array("value"=>$topic->topicName));
echo $this->Form->input('topicAuthor',array("value"=>$topic->topicAuthor));
echo $this->Form->button(__('Save Topic'));
echo $this->Form->end();
?>