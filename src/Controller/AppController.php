<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent("Auth",[
                //"authorize" => ["Controller"],
                "loginRedirect"=>[
                    "controller"=>"Home",
                    "action"=>"index"
                ],
                "logoutRedirect"=>[
                    "controller"=>"Users",
                    "action"=>"login"
                ]
            ]
        );

        date_default_timezone_set("Africa/Nairobi");
    }
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');

        public function beforeFilter(EventInterface $event){
            $this->Auth->allow(["register","login"]);
            if($this->request->getSession()->read("user")){
                @$this->request->getSession()->delete("Flash");
                @$this->Auth->allow(["","index","view","display","productData","serviceData","addSale","analyticsData"]);
                if($this->request->getSession()->read("user")->isAdmin){
                    @$this->Auth->allow(["",
                                            "index",
                                            "add",
                                            "view",
                                            "display",
                                            "edit",
                                            "delete",
                                            "productData",
                                            "serviceData",
                                            "addsale",
                                            "manage",
                                            "analyticsData"]);
                }

                $this->set("user",$this->request->getSession()->read("user"));
            }

            
            
        }

        public function isAuthorized($user){
            if (isset($user["isAdmin"]) && $user["isAdmin"] == true) {
                return true;
            }
            return false;
        }

}
