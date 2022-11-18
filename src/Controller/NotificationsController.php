<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Home Controller
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NotificationsController extends AppController
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
        $products = $this->Products->find()->where(["Products.productQuantity <"=>50])->all();
        $services = $this->Services->find()->all();
        $this->set(compact('services'));
        $this->set(compact('products'));
    }

    public function home(){

    }
}
