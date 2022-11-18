<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

 use Cake\View\JsonView;
class ServicesController extends AppController
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
        $services = $this->paginate($this->Services);

        $this->set(compact('services'));
    }

    /**
     * View method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('service'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $service = $this->Services->newEmptyEntity();
        $imageUploadPath = WWW_ROOT."/img/product_images/";
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $clientImage = $data["serviceImage"];
            $serviceImageName = time()."_".$clientImage->getClientFilename();

            
            $clientImage->moveTo($imageUploadPath.$serviceImageName);
                $serviceEntity = [
                    "serviceName"=>$data["serviceName"],
                    "serviceImage"=>"product_images/".$serviceImageName
                ];

                $service = $this->Services->patchEntity($service, $serviceEntity);
                if ($this->Services->save($service)) {
                    $this->Flash->success(__('The service has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The service could not be saved. Please, try again.'));
            }

        $this->set(compact('service'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $service = $this->Services->patchEntity($service, $this->request->getData());
            if ($this->Services->save($service)) {
                $this->Flash->success(__('The service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service could not be saved. Please, try again.'));
        }
        $this->set(compact('service'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $service = $this->Services->get($id);
        if ($this->Services->delete($service)) {
            $this->Flash->success(__('The service has been deleted.'));
        } else {
            $this->Flash->error(__('The service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function serviceData($id){
        $this->loadModel("Services");
        $service = $this->Services->get($id);
        $this->set('service', $service);
        $this->viewBuilder()->setOption('serialize', ['service']);
    }
}
