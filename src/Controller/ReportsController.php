<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Reports Controller
 *
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
use Cake\Datasource\ConnectionManager;
class ReportsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel("Sales");
        $this->loadModel("Salesorder");
        $db = ConnectionManager::get("default");

        $reports = [];
        if(isset($_GET["sortby"])){
            $type = $_GET["sortby"];
            $startDate =  date("m-d-Y",strtotime($_GET["startDate"]?$_GET["startDate"]:date("Y-m-d")));
            $endDate = date("m-d-Y",strtotime($_GET["endDate"]?$_GET["endDate"]:date("Y-m-d")));
            if($type === "All"){
                $allQuery = "SELECT * FROM sales WHERE saleDate BETWEEN ? AND ?";
                $reports = $db->execute($allQuery,[$startDate,$endDate]);
                //$reports = $this->Sales->find()->all();
                /*$reports = $this->Sales
                                    ->find()
                                    ->where([
                                        "Sales.saleDate BETWEEN"=>$endDate,
                                        "Sales.saleDate"=>$startDate
                                    ])->all();*/
            }else{
                $type = trim(strtolower(substr($type,0,strlen($type)-1)));
                //$reports = $this->Salesorder->find()->all();
                $query = "SELECT * FROM salesorder WHERE salesOrderType=? AND salesOrderDate BETWEEN ? AND ?";
                
                $reports = $db->execute($query,[$type,$startDate,$endDate])->fetchAll("assoc");

                /*$reports = $this->Salesorder
                                    ->find()
                                    ->where([
                                        "Salesorder.salesOrderType"=>$type,
                                        "Salesorder.salesOrderDate BETWEEN"=>$startDate,
                                        "Salesorder.salesOrderDate"=>$endDate
                                    ])->all();*/
            }
            $this->set(compact('startDate'));
            $this->set(compact('endDate'));
        }

        
        $this->set(compact('reports'));
    }

        
}
