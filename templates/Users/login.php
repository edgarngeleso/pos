<?php
/**
 * @var \App\View\AppView $this
 */
$this->disableAutoLayout();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$this->fetch("title") ?></title>
        <?= $this->Html->css("bootstrap/dist/css/bootstrap.min.css") ?>
        <?= $this->Html->css("register") ?>
        <?= $this->Html->css("login") ?>
    </head>

    <body>
        <?= $this->Form->create($user,["class"=>"form"]) ?>
        <h2 class="h2 mb-4 fw-normal">Sign In</h2>
        <label class=<?php echo $error!==null?"show":"hide" ?>><?= $error ?></label>
        <label>User name</label>
        <?= $this->Form->input("userName",["class"=>"form-control"]) ?>
        <label>Password</label>
        <?= $this->Form->password("userPassword", ["class"=>"form-control"]) ?>
        <?= $this->Form->button(__("Sign In"), ["class"=>"w-100 btn btn-lg custom-button loginBtn"]) ?>
        <label class="copy-right">
           Copyright © <?= Date("Y") ?>
        </label>
        <?= $this->Form->end() ?>
    </body>
    
    <script>
        console.log();
    </script>
</html>