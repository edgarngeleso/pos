<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sales Controller
 *
 * @property \App\Model\Table\SalesTable $Sales
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
use Cake\View\JsonView;
class SalesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function viewClasses(): array
    {
        return [JsonView::class];
    }
    public function index()
    {
        $sales = $this->paginate($this->Sales);

        $this->set(compact('sales'));
    }

    /**
     * View method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('sale'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sale = $this->Sales->newEmptyEntity();
        if ($this->request->is('post')) {
            $sale = $this->Sales->patchEntity($sale, $this->request->getData());
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale could not be saved. Please, try again.'));
        }
        $this->set(compact('sale'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sale = $this->Sales->patchEntity($sale, $this->request->getData());
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale could not be saved. Please, try again.'));
        }
        $this->set(compact('sale'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sale = $this->Sales->get($id);
        if ($this->Sales->delete($sale)) {
            $this->Flash->success(__('The sale has been deleted.'));
        } else {
            $this->Flash->error(__('The sale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addSale(){
        $this->request->allowMethod(["post","get"]);
        $invoiceNumber = "INV".random_int(1000,100000)."RCP".random_int(1000,5000);
        $cashier = @$this->request->getSession()->read("user")->userName;
        $errors = ["state"=>false,"message"=>"success"];
        $saleTotalSellingAmount = 0;
        $saleTotalBuyingAmount = 0;
        $this->loadModel("Salesorder");
        $this->loadModel("Sales");

        $saleData = [];
        $outData = [];

        $todayDate = date("m-d-Y");
        if($this->request->is("post")){

            $sales = json_decode($this->request->getData()["cart"]);
            //save individual sale order

            foreach ($sales as $key => $sale) {
                $saleTotalSellingAmount += ($sale->qty*$sale->productSellingPrice);
                $saleTotalBuyingAmount += ($sale->qty*$sale->productBuyingPrice);

                $dataArray = [
                    "salesOrderInvoice"=>$invoiceNumber,
                    "salesOrderProductID"=>$sale->productID??$sale->serviceID,
                    "salesOrderQuantity"=>$sale->qty,
                    "salesOrderAmount"=>$sale->qty*$sale->productSellingPrice,
                    "salesOrderProfit"=>(($sale->qty*$sale->productSellingPrice)-($sale->qty*$sale->productBuyingPrice)),
                    "salesOrderName"=>$cashier,
                    "salesOrderPrice"=>$sale->productSellingPrice,
                    'salesOrderType' => $sale->type,
                    "salesOrderDiscount"=>0.0,
                    "salesOrderDate"=> $todayDate
                ];

                $dataArray1 = [
                    "salesOrderInvoice"=>$invoiceNumber,
                    "salesOrderProductID"=>$sale->productID??$sale->serviceID,
                    "salesOrderQuantity"=>$sale->qty,
                    "salesOrderAmount"=>$sale->qty*$sale->productSellingPrice,
                    "salesOrderName"=>$cashier,
                    "salesOrderPrice"=>$sale->productSellingPrice,
                    'salesOrderType' => $sale->type,
                    "salesOrderProductName"=>$sale->productName??$sale->serviceName,
                    "salesOrderDiscount"=>0.0,
                    "salesOrderDate"=> $todayDate
                ];

                array_push($outData,$dataArray1);

                $emptySale = $this->Salesorder->newEmptyEntity();
                $saleEntity = $this->Salesorder->patchEntity($emptySale,$dataArray);
                if(!$this->Salesorder->save($saleEntity)){
                    $errors["state"] = true;
                    $errors["message"] = "Failed to save.";
                }
            }

            //save the overall sale
            $emptySale = $this->Sales->newEmptyEntity();
            
            $saveSale = [
                "saleInvoiceNumber"=>$invoiceNumber,
                "saleCashier"=>$cashier,
                "saleDate"=>$todayDate,
                "saleType"=>"Normal",
                "saleAmount"=>$saleTotalSellingAmount,
                "saleProfit"=>($saleTotalSellingAmount-$saleTotalBuyingAmount),
                "balance"=>0
            ];
            $patchSaleEntity = $this->Sales->patchEntity($emptySale,$saveSale);
            

            if(!$this->Sales->save($patchSaleEntity)){
                $errors["state"] = true;
                $errors["message"] = "Failed to save.";
            }
        }

        $saleData["invoiceNumber"] = $invoiceNumber;
        $saleData["cashier"] = $cashier;
        $saleData["total"] = $saleTotalSellingAmount;
        $saleData["saleData"] = $outData;
        $saleData["errors"] = $errors;
        $saleData["saleDate"] = $todayDate;

        $this->set("saleData",$saleData);
        $this->viewBuilder()->setOption('serialize', ['saleData']);
    }
}
