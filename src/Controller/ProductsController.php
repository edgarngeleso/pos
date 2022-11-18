<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
use Cake\View\JsonView;
class ProductsController extends AppController
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
        $products = $this->paginate($this->Products);
        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imageUploadPath = WWW_ROOT."/img/product_images/";
        $addProduct = $this->Products->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $clientImage = $data["productImage"];
            $clientImageName = time()."-".$clientImage->getClientFilename();
            $clientImage->moveTo($imageUploadPath.$clientImageName);
            
            $productData = [
                "productName"=>$data["productName"],
                "productBuyingPrice"=>$data["productBuyingPrice"],
                "productSellingPrice"=>$data["productSellingPrice"],
                "productQuantity"=>$data["productQuantity"],
                "supllierID"=>1,
                "productImage"=>"product_images/".$clientImageName
            ];
            $addProduct = $this->Products->patchEntity($addProduct, $productData);
            if ($this->Products->save($addProduct)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('addProduct'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function productData($id){
        $this->loadModel("Products");
        $product = $this->Products->get($id);
        $this->set('product', $product);
        $this->viewBuilder()->setOption('serialize', ['product']);
    }
}
