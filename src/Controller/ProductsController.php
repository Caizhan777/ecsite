<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\SearchProductForm;

class ProductsController extends AppController
{

  public function initialize()
  {
      parent::initialize();
      $this->Auth->allow(['index','view','edit','add']);
  }

    public function index()
    {
      $this->loadModel('Products');

      $searchProductForm = new SearchProductForm();

      if($this->request->getQuery('form_name') && $this->request->getQuery('form_name') == "search_product_form") {

        $result = $searchProductForm->execute($this->request->getQueryParams());

        $conditions = array();

        if($this->request->getQuery('product_name')) {
          $conditions["Products.product_name LIKE"] = '%'.$this->request->getQuery('product_name').'%';
        }

        $products = $this->paginate($this->Products,array(
            'conditions' => $conditions
          )
        );

        $this->request->data('form_name',$this->request->getQuery('form_name'));
        $this->request->data('product_name',$this->request->getQuery('product_name'));
      } else {
        $products = $this->paginate($this->Products);
      }
        $this->set(compact('products'));
        $this->set('_serialize', ['products']);

    }

    public function view($id = null)
    {
        $this->loadModel('Products');

        $product = $this->Products->get($id, [
            'contain' => []
        ]);

        // var_dump($product);
        // exit();
        if($this->request->is('post')) {
          if($this->request->getData("id")){

            $session = $this->request->session();

            if($session->check('Cart.info')){
                $carts = $session->read('Cart.info');

                $has_one = false;
                foreach($carts as $cart){
                    if($cart['Product_id'] == $id){

                        $cart['Buy_num'] += $this->request->getData("buy_num");
                        $has_one = true;

                        break;
                    }
                }

                if(!$has_one) {
                  $carts[] = array(
                    'Product_id' => "$product->id",
                    'Buy_num' => $this->request->getData("buy_num"),
                    'Product_name' => "$product->product_name",
                    'Product_price' => "$product->product_price"
                  );
                }


                $session->write('Cart.info',$carts);


            }else{

              $carts = array([
                'Product_id' => "$product->id",
                'Buy_num' => $this->request->getData("buy_num"),
                'Product_name' => "$product->product_name",
                'Product_price' => "$product->product_price"
              ]);
              $session->write('Cart.info',$carts);

            }

            return $this->redirect(['controller' => 'Carts','action' => 'index']);

          }
          $this->Flash->error(__('jia ru gou wu che shi bai .'));
        }

         $this->set('product', $product);
         $this->set('_serialize', ['product']);
    }

    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }


    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
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
        $this->set('_serialize', ['product']);
    }

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
}
