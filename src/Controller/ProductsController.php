<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;

class ProductsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['view']);
    }
    public function index(){

    }
    public function view($id = null){

      if($this->request->is('post')){
          if($this->request->getData('product_num') > 0){
            /* 做一个session的数据写入 */
            /* 写入完成 */

              return $this->redirect(['controller'=>'Carts','action' => 'index']);
          }

      }

    }
}
