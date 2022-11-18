<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Order> $orders
 */
?>
<h4 class="heading">Inventory</h4>
<?php
    //print_r($products);
?>

<div>
<h5 class="heading">Products inventory</h5>
<table class="resultTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Product ID</th>
                <th>Product name</th>
                <th>Bought quantity</th>
                <th>Sold quantity</th>
                <th>Remaining quantity</th>
                <th>Sold Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $saleTotal = 0;
                $profitTotal = 0;
                $count = 1;
                foreach($products as $product):
            ?>
                <tr>
                    <td><?=$count?></td>
                    <td><?=$product["productID"]?></td>
                    <td><?=$product["productName"]?></td>
                    <td><?=$product["productQuantity"]?></td>
                    <td><?=$product["soldQuantity"]?></td>
                    <td><?=$product["productQuantity"]-$product["soldQuantity"]?></td>
                    <td><?=number_format($product["salesOrderAmount"])?></td>
                </tr>
            <?php
                $count++;
                endforeach;
            ?>
        </tbody>
        <!--<thead>
		<tr>
			<th colspan="4" style="border-top:1px solid #999999"> Total: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
                Ksh.<?= number_format($saleTotal) ?>       
			</th>
            <th colspan="1" style="border-top:1px solid #999999"> 
                Ksh.<?= number_format($profitTotal) ?>       
			</th>
		</tr>
	</thead>-->
    </table>
</div>

<h5 class="heading">Services inventory</h5>