<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php
echo $this->HTML->charset();
echo $this->HTML->css("navbar");
echo $this->HTML->css("home");
echo $this->Html->css("bootstrap/dist/css/bootstrap.min.css");
?>
<title>POS:<?= $this->fetch("title") ?></title>