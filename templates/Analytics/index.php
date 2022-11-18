<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<style>
    .loading{
        width: 100%;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .analytics{
        width: 100%;
        height: auto;
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
</style>
<div class="loading">
    <h4>Loading....</h4>
</div>
<div class="analytics">
    <?php 
        //print_r($services);
        //print_r($products);
     ?>

     <h4 class="heading">Today's sales</h4>
     <canvas class="canvas"></canvas>

     <h4 class="heading">Sales in the past one week</h4>
     <canvas class="canvas1"></canvas>

     <h4 class="heading">Monthly sales (4 weeeks period)</h4>
     <canvas class="canvas2"></canvas>

     <h4 class="heading">Yearly sales (12 months period)</h4>
     <canvas class="canvas3"></canvas>
</div>
<?=$this->Html->script("chartjs/dist/chart.min.js")?>
<?=$this->Html->script("analytics.js")?>
