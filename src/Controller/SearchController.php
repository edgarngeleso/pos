<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Home Controller
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SearchController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $_GET["searchQuery"];
        $products = [];
        $services = [];
        $this->loadModel("Products");
        $this->loadModel("Services");
        if(!empty($query)){
            $products = $this->Products->find()->where(["Products.productName LIKE"=>"%".$query."%"])->all();
            $services = $this->Services->find()->where(["Services.serviceName LIKE"=>"%".$query."%"])->all();
        }
        $this->set(compact('services'));
        $this->set(compact('products'));
    }

    public function home(){

    }
}
