<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<h5 style="font-weight:bold;margin: 1%;">Categories</h5>
<div class="categories">
    <a href="/" class="isActiveDark">All</a>
    <a href="/products" class="isInActive">Products</a>
    <a href="/services" class="isInActive">Services</a>
</div>

<?php
if(count($products)>0){?>
    <div class="heading">
        <h5 >Products</h5>
        <a href="/products">view all</a>
    </div>
<?php
}?>

<div class="products">
    <?php 
        foreach($products as $product):
    ?>
        <div class="product-card " id="products">
            <?= $this->Html->image($product->productImage,["class"=>"product-image"]) ?>
            <div class="product-info">
                <div class="lacksActions">
                    <?php
                        $jsonData = json_encode([["id"=>$product->productID,
                                                "image"=>$product->productImage,
                                                "price"=>$product->productPrice,
                                                "qty"=>1]]);
                    ?>
                    <input type="hidden" value="<?=$product->productID?>" id="productData">
                    <p><?=$product->productName?></p>
                    <p>Ksh. <?= number_format($product->productSellingPrice) ?></p>
                </div>
                <button class="add-to-cart" id="add-product">Add</button>
            </div>
        </div>
    <?php
        endforeach
    ?>
</div>

<?php
if(count($services)>0){?>
    <div class="heading">
        <h5 >Services</h5>
        <a href="/services">view all</a>
    </div>
<?php
}?>


<div class="products">
    <?php 
        foreach($services as $service):
    ?>
        <div class="product-card ">
            <?= $this->Html->image($service->serviceImage,["class"=>"product-image"]) ?>
            <div class="product-info">
                <div class="lacksActions">
                    <input type="hidden" value="<?=$service->serviceID?>" id="serviceData">
                    <p><?=$service->serviceName?></p>
                </div>
                <button class="add-to-cart" id="add-service">Add</button>
            </div>
        </div>
    <?php
        endforeach
    ?>
</div>