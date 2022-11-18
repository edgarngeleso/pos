<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>

<h3><?= __('Services') ?></h3>
<?php
    if($user->isAdmin){?>
        <div class="top-bar-add">
            <b></b>
            <?=$this->Html->link(__("Add service"),["action"=>"add"],["class"=>"add-product"])?>
        </div>
    <?php 
    }
?>
<div class="products">
    <?php 
        foreach($services as $service):
    ?>
        <div class="product-card ">
            <?= $this->Html->image($service->serviceImage,["class"=>"product-image"]) ?>
            <div class="product-info">
                <?php  
                    if($user->isAdmin){
                ?>
                <div class="hasActions">
                    <button class="custom-button">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->serviceID]) ?>
                    </button>
                    <button class="custom-button" style="background-color:red;">
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->serviceID], ['confirm' => __('Are you sure you want to delete {0}?', $service->serviceName)]) ?>
                    </button>
                </div>
                <?php
                    }
                ?>

                <div class="<?=$user->isAdmin?"hasActionsInfo":"lacksActions"?>">
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

    <?php //echo $this->Html->link(__('New service'), ['action' => 'add'], ['class' => 'button float-right']) ?>

    <!--<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <?php foreach ($services as $service): ?>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal"><?= $service->serviceName ?></h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= h($service->serviceName) ?></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li><?= h($service->serviceName) ?></li>
                    <li><?= h($service->serviceName) ?></li>
                    </ul>

                    
                    Only visible to admins

                    <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $service->serviceID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->serviceID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->serviceID], ['confirm' => __('Are you sure you want to delete # {0}?', $product->productID)]) ?>
                    </td>

                    <button type="button" class="w-100 btn btn-lg btn-outline-primary">Add</button>
                </div>
                </div>
                </div>
            <?php endforeach ?>
    </div>
        -->
