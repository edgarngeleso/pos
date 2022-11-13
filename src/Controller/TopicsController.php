<?php

namespace App\Controller;

use App\Controller\AppController;

class TopicsController extends AppController
{

    /*public function initialize()
    {
        //parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
    }*/

    public function index()
    {
        //print_r($this->Topics->find("all"));
        //$this->loadModel("TopicsTable");
        $this->set('topics', $this->Topics->find('all'));
        $this->_viewBuilder->setLayout("default");
    }

    public function viewTopic(int $id){
        $this->set("topic",$this->Topics->get($id));
    }

    public function addTopic(){
        $topic = $this->Topics->newEmptyEntity();
        $this->set('topic', $topic);
        if ($this->request->is('post')) {
            $topic = $this->Topics->patchEntity($topic, $this->request->getData());
            if ($this->Topics->save($topic)) {
                $this->Flash->success(__('Your topic has been saved.'));
                return $this->redirect(['action' => '/index']);
            }
        }
        $this->set('topic', $topic);
    }

    public function editTopic(int $id){
        $topic = $this->Topics->get($id);
        $this->set('topic', $topic);
        if ($this->request->is(['post', 'put'])) {
            print_r($this->request->getData());
            $this->Topics->patchEntity($topic, $this->request->getData());
            if ($this->Topics->save($topic)) {
            $this->Flash->success(__('Your topic has been updated.'));
            return $this->redirect(['action' => '/index']);
            }
            $this->Flash->error(__('Unable to update your topic.'));
        }
        $this->set('topic', $topic);
    }

    public function deleteTopic(int $id){
        $this->request->allowMethod(['post', 'delete']);
        $topic = $this->Topics->get($id);
        if ($this->Topics->delete($topic)) {
            $this->Flash->success(__('The topic with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => '/index']);
        }
    }
}