<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'POS';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->element("head") ?>
</head>
<body>
    <div class="all">
        <?= $this->element("navbar") ?>
        <?= $this->element("leftbar") ?>
        <main class="content">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </main>
        <?= $this->element("rightbar") ?>
    </div>
    <?= $this->element("footer") ?>
</body>
</html>
