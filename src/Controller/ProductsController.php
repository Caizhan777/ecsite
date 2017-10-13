<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\SearchProductForm;

class ProductsController extends AppController
{

  public function initialize()
  {

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
        $this->set(compact('searchProductForm'));
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

            if($session->check('cart.info')){
                $carts = $session->read('cart.info');

                $has_one = false;
                foreach($carts as &$cart){
                    if($cart['Product.id'] == $id){


                        $cart['Buy.num'] += $this->request->getData("buy_num");
                        $has_one = true;
                        break;
                    }
                }

                if(!$has_one) {
                  $carts[] = array(
                    'Product.id' => "$product->id",
                    'Buy.num' => $this->request->getData("buy_num"),
                    'Product.name' => "$product->product_name",
                    'Product.price' => "$product->product_price"
                  );
                }


                $session->write('cart.info',$carts);


            }else{

              $carts = array([
                'Product.id' => "$product->id",
                'Buy.num' => $this->request->getData("buy_num"),
                'Product.name' => "$product->product_name",
                'Product.price' => "$product->product_price"
              ]);
              $session->write('cart.info',$carts);

            }
            //  var_dump($session->read('cart.info'));exit();

            return $this->redirect(['controller' => 'Carts','action' => 'obtain']);

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
