<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Order> $orders
 */
?>

<h4 class="heading">Notifications</h4>
<p style="margin: 1%;">The following products' quantity is running low</p>
<?php
foreach ($products as $key => $product): ?>

    <div style="width:98%;height:40px;display:flex;flex-direction:row;margin:1%;">
        <b><?=$product->productName?></b>
        <p style="margin-left:20px;">Remaining quantity: <?=$product->productQuantity?> items</p>
    </div>

<?php endforeach ?>