<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Home Controller
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
use Cake\Datasource\ConnectionManager;
class InventoryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel("Products");
        $this->loadModel("Services");
        $db = ConnectionManager::get("default");

        $productsInventoryQuery = "SELECT 
                                SUM(salesOrderQuantity) 
                                AS soldQuantity,productName,productSellingPrice,productQuantity,productID,salesOrderAmount
                                FROM salesorder 
                                INNER JOIN products 
                                ON salesorder.salesOrderProductID=products.productID
                                WHERE salesorder.salesorderType='product'
                                GROUP BY productID";
        
        $products = $db->execute($productsInventoryQuery,[])->fetchAll("assoc");

        $services = $this->Services->find()->all();
        $this->set(compact('services'));
        $this->set(compact('products'));
    }
}