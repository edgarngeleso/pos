<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<?php
    if(count($services)<1 && count($products)<1){?>
    <div 
        style="width: 100%;
                height:400px;
                display:flex;
                align-items:center;
                justify-content:center;
                font-size:18px;"      
    >No results found matching <?=isset($_GET["searchQuery"])?"'".$_GET["searchQuery"]."'":""?></div>
<?php
    }
?>
<div class="products">
    <?php
        if(count($services)>0){?>
        <h4 class="heading">Products</h4>
    <?php
        }
    ?>

    <?php 
        foreach($products as $product):
    ?>
        <div class="product-card " id="products">
            <?= $this->Html->image($product->productImage,["class"=>"product-image"]) ?>
            <div class="product-info">
                <div>
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


<div class="products" style="margin-top:3%;">
    <?php
        if(count($services)>0){?>
        <h4 class="heading">Services</h4>
    <?php
        }
    ?>
    <?php 
        foreach($services as $service):
    ?>
        <div class="product-card ">
            <?= $this->Html->image($service->serviceImage,["class"=>"product-image"]) ?>
            <div class="product-info">
                <div>
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