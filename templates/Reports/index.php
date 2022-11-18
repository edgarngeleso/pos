<?=$this->HTML->css("reports")?>
<div class="reports">
    <div class="sort">

        <form class="date-range" action="/reports">
            <span>
                sortby: <select name="sortby" class="input">
                    <option>All</option>
                    <option>Products</option>
                    <option>Services</option>
                </select>
            </span>
            <span>
                 start Date: <input type="date" name="startDate" class="input"/>
            </span>
            <span>
                 end Date: <input type="date" name="endDate" class="input"/>
            </span>
            <button type="submit" class="button" style="font-size:16px;width:80px;height:75%;">Generate</button>
        </form>

        <div style="font-weight:bolder;">
            <?php
                if(isset($_GET["endDate"])){
                echo "Showing ".$_GET["sortby"]." sales report from ".$startDate." to ".$endDate;
                }
            ?>
        </div>

    </div>
    
    <table class="resultTable">
        <thead>
            <tr>
                <th>#</th>
                <th>invoice number</th>
                <th>cashier</th>
                <th>sale date</th>
                <th>Sale amount</th>
                <th>Profit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $saleTotal = 0;
            $profitTotal = 0;
            if ($reports) {?>

                <?php foreach ($reports as $key => $report): ?>
                    <tr>
                        <td>
                            <?=$report["saleID"]??$report["salesOrderID"]?>
                        </td>
                        <td>
                            <?=$report["saleInvoiceNumber"]??$report["salesOrderInvoice"]?>
                        </td>
                        <td>
                            <?=$report["saleCashier"]??$report["salesOrderName"]?>
                        </td>
                        <td>
                            <?=$report["saleDate"]??$report["salesOrderDate"]?>
                        </td>
                        <td>
                            <?=number_format($report["saleAmount"]??$report["salesOrderAmount"])?>
                        </td>
                        <td>
                            <?=number_format($report["saleProfit"]??$report["salesOrderProfit"])?>
                        </td>
                    </tr>
                <?php 
                    $saleTotal += $report["saleAmount"]??$report["salesOrderAmount"];
                    $profitTotal += $report["saleProfit"]??$report["salesOrderProfit"];
                endforeach; ?>
                
            <?php }?>
        </tbody>
        <thead>
		<tr>
			<th colspan="4" style="border-top:1px solid #999999"> Total: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
                Ksh.<?= number_format($saleTotal) ?>       
			</th>
            <th colspan="1" style="border-top:1px solid #999999"> 
                Ksh.<?= number_format($profitTotal) ?>       
			</th>
		</tr>
	</thead>
    </table>

</div>