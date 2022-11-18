<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>

    <h3><?= __('Products') ?></h3>
    <?php
    if($user->isAdmin){?>
        <div class="top-bar-add">
            <b></b>
            <?=$this->Html->link(__("Add product"),["action"=>"add"],["class"=>"add-product"])?>
        </div>

    <?php 
    }
    ?>
    <?php //echo $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>

    <!--<div class="row row-cols-1 row-cols-md-3 mb-3 text-center"  >
        <?php foreach ($products as $product): ?>


            <div class="card" style="padding: 1%;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $product->productName?></h5>
                </div>
                <button type="button" class="w-100 btn btn-outline-primary">Add</button>
        </div>


            <div class="col"  style="padding: 1%; height:300px;margin-top:10px;">
                <div class="card mb-4 rounded-3 shadow-sm" style="width: 100%;height:100%;">
                    <?= $this->Html->image("pos_image.jpg",array("class"=>"card-img-top","width"=>"100%","height"=>"60%","object-fit"=>"cover"))?>
                    <div class="card-body">
                        <h4 class="card-title pricing-card-title"><?= $product->productName ?></h4>

                        
                        Only visible to admins

                        <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $product->productID]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->productID]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->productID], ['confirm' => __('Are you sure you want to delete # {0}?', $product->productID)]) ?>
                        </td>

                        <button type="button" class="w-100 btn btn-outline-primary">Add</button>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        
    </div>-->
<div class="products">
    <?php 
        foreach($products as $product):
    ?>
        <div class="product-card " id="products">
            <?= $this->Html->image($product->productImage,["class"=>"product-image"]) ?>
            <div class="product-info">
                <?php  
                        if($user->isAdmin){
                    ?>
                    <div class="hasActions">
                        <button class="custom-button">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->productID]) ?>
                        </button>
                        <button class="custom-button" style="background-color:red;">
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->productID], ['confirm' => __('Are you sure you want to delete {0}?', $product->productID)]) ?>
                        </button>
                    </div>
                <?php
                    }
                ?>

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
        
    <!--<div class="paginator">
        <ul class="pagination">
            <?=$this->Form->button("Previous",["class"=>"btn btn-primary"])?>
            <b>2</b>
            <?= $this->Paginator->numbers() ?>
            <?=$this->Form->button("Next",["class"=>"btn btn-primary"])?>
            <?= $this->Paginator->first() ?>
            <?= $this->Paginator->prev() ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next')) ?>
            <?= $this->Paginator->last(__('last')) ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}}.')) ?></p>
    </div>-->
