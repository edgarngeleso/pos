<div class="sidebar" style="display: flex; 
                            flex-direction: column;
                            margin-top:20vh;
                            width:16%;
                            height:95vh;
                            position:fixed;
                            background-color:#ffffff;
                            border-right:1px solid #000000;">
    <a href="/pos">Home</a>
    <a href="/pos/products">products</a>
    <?php
    //print_r($auth);
    if (!$auth) {?>
        <a href="/pos/users">Users</a>
    <?php
        }
    ?>
    
    <a href="/pos/services">Services</a>
    <a href="/pos/reports">Reports</a>
    <a href="/pos/reports">Inventory</a>
</div>


