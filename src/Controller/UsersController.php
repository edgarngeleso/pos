<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function beforeFilter(EventInterface $event){
        parent::beforeFilter($event);
        $this->Auth->allow(["logout"]);
    }
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $viewuser = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('viewuser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $addData = ["userName"=>$this->request->getData()["userName"],
                        "userPassword"=>password_hash($this->request->getData()["userPassword"],PASSWORD_DEFAULT),
                        "isAdmin"=>$this->request->getData()["isAdmin"]];

            $user = $this->Users->patchEntity($user, $addData);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set("addUser",$user);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set("editUser",$user);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){

        $user = $this->Users->newEmptyEntity();
        $this->set("error",null);

        //check if its first user and 
        $availableUsers = $this->Users->find("all");
        if($availableUsers->count()<=0){
            return $this->redirect("users/register");
        }

        if($this->request->is("post")){
            $requestData = $this->request->getData();
            $userData = null;
            $allUsers = $this->Users->find()->all();
            foreach ($allUsers as $key => $value) {
                if($value->userName == $requestData["userName"]){
                    $userData = $value;
                    break;
                }
            }
            
            if($userData != null){
                if(password_verify($requestData["userPassword"],$userData->userPassword)){
                    $this->request->getSession()->write("user",$userData);
                    return $this->redirect($this->Auth->redirectUrl());
                }else{
                    $this->set("error","Wrong password.");
                }
            }else{
                $this->set("error","User name not found.");
            }
            
            
            /*$currentUser = $this->Auth->identify();
            //return $this->redirect("users/add");
            //print_r($currentUser);

            if($currentUser){
                $this->set("error","Logged in");
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
                //header("Location:/pos");
                //exit();
            }*
            //$this->set("error","Invalid user name or password");
            //$this->Flash->error(__("Invalid user name or password"));
            //$data = $this->Users->query($query)->first();
            //$data = $this->Users->find("all")->all();
            
            //$data = $this->Users->find("all",["conditions" => ["Users.userName=?" => $requestData["userName"]]]);
            //$data = $this->Users->find()->where(["Users.userName=?" => $requestData["userName"]]);
            //print_r($this->Users->find()->where(["Users.userName=?" => $requestData["userName"]]));
            //$this->redirect(["action"=>"/"]);
            
            /*if($requestData["userName"] == $data->userName){
                if($requestData["userPassword"] == $data->userPassword){
                    $this->set("error",null);
                    $this->redirect(["action"=>"pages/"]);
                }else{
                    $this->set("error","Wrong password.");
                }
            }else{
                $this->set("error","User name not found.");
            }*/
        }
        
        $this->set("user",$user);
    }

    public function logout(){
        /*session_start();
        session_destroy();
        header("Location:pos/users/login");
        exit();*/
        //return $this->redirect($this->Auth->logout());
    }

    public function register(){
        $user = $this->Users->newEmptyEntity();
        $this->set("error",null);
        $this->set("user",$user);

        //check if its first user and 
        $availableUsers = $this->Users->find("all");
        if($availableUsers->count()>0){
            return $this->redirect("users/login");
        }

        if($this->request->is("post")){
            $requestData = $this->request->getData();
            
            $data = $this->Users->find("all")->all();
            //print_r($this->Users->find("all")->where(["Users.userName ="=>$requestData["userName"]])->all());
            //print_r($this->Users->find("all",["conditions" => ["Users.userName =" => $requestData["userName"]] ]));

            foreach ($data as $key => $value) {
                if($value->userName == $requestData["userName"]){
                    $this->set("error","User name exists");
                    return;
                }
            }

            if($requestData["userPassword"] == $requestData["confirmPassword"]){
                @$addData = ["userName"=>$requestData["userName"],
                        "userPassword"=>password_hash($requestData["userPassword"],PASSWORD_DEFAULT),
                        "isAdmin"=>$requestData["isAdmin"]];

                $user = $this->Users->patchEntity($user, $addData);
                if ($this->Users->save($user)) {
                    $this->set("error",null);
                    //$this->Flash->success(__('Successfully registered.'));
                    return $this->redirect(['action' => '/login']);
                }else{
                    $this->set("error","Unable to create account. Try again later.");
                }
            }else{
                $this->set("error","Password did not match confirmed password.");
            }
        }
        
        $this->set("user",$user);
        //$this->viewBuilder->setLayout("default");
    }
}
