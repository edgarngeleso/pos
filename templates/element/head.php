<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php
echo $this->HTML->charset();
echo $this->HTML->css("navbar");
echo $this->Html->css("bootstrap/dist/css/bootstrap.min.css");
echo $this->HTML->css("pos");
?>
<title>POS:<?= $this->fetch("title") ?></title>