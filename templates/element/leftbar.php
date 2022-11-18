<?php
/** 
 * @var \App\View\AppView $this
 */
    date_default_timezone_set("Africa/Nairobi");
    echo $this->HTML->css("leftbar");
    $urls = ["/","Products","Services","Users","Reports","Inventory"];
?>
<div class="sidebar">
    <a href="/" <?=$this->fetch("title")=="Home"?"class='isActive'":null?>>
        <?=$this->Html->image("assets/home.png")?>
        Home
    </a>
    <a href="/products" <?=$this->fetch("title")=="Products"?"class='isActive'":null?>>
        <?=$this->Html->image("assets/products.png")?>
        Products
    </a>
    <a href="/services" <?=$this->fetch("title")=="Services"?"class='isActive'":null?>>
        <?=$this->Html->image("assets/services.png")?>
        Services
    </a>
    <?php
    if ($user->isAdmin) {?>
        <a href="/users" <?=$this->fetch("title")=="Users"?"class='isActive'":null?> >
            <?=$this->Html->image("assets/team.png")?>
            Users
        </a>
    <?php
        }
    ?>
    <a href="/reports" <?=$this->fetch("title")=="Reports"?"class='isActive'":null?>>
        <?=$this->Html->image("assets/report.png")?>
        Reports
    </a>
    <a href="/inventory" <?=$this->fetch("title")=="Inventory"?"class='isActive'":null?>>
        <?=$this->Html->image("assets/inventory.png")?>
        Inventory
    </a>

    <a href="/analytics" <?=$this->fetch("title")=="Analytics"?"class='isActive'":null?>>
        <?=$this->Html->image("assets/dashboard.png")?>
        Analytics
    </a>
    
    <div class="dateTime">
        <p class="time"><?=date("H:i:s")?></p>
        <p><?=Date("D").",".date('d-M,Y') ?></p>
    </div>
</div>

<script>
let time = document.querySelector(".time");
let today = new Date();
let seconds = today.getSeconds();
let minutes = today.getMinutes();
let hours = today.getHours();

const updateTime = ()=>{
    setInterval(()=>{
        if(seconds>59){
            seconds = 0
            minutes++;
            if(minutes>59){
                minutes = 0;
                hours++
                if(hours>23){
                    hours=0;
                }else{
                    hours++
                }
            }
        }else{
            seconds++;
        }

        let AMPM = hours>=12?"PM":"AM";
        time.innerHTML = `${hours}:${minutes}:${seconds} ${AMPM}`;
    },1000)
}

updateTime();
</script>


