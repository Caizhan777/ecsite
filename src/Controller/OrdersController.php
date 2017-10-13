<?php

namespace App\Controller;

use Cake\ORM\Table;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Session\DatabaseSession;
use App\Model\Table\OrderDetailTable;
use App\Model\Table\OrdersTable;
use App\Model\Entity\OrderDetail;
use App\Model\Entity\Order;
use App\Form\OrderForm;
use Cake\Datasource\EntityInterface;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class OrdersController extends AppController {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function admin() {
        $this->viewBuilder()->layout('');
        $orders = $this->paginate($this->Orders);
        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);
    }

    public function comfirm() {

        $this->viewBuilder()->layout('');
        $cart_data = $this->checkout();
        //get cart data
        //$this->loadModel('Orders');
        //$this->loadModel('OrderDetails');
        $order = $this->Orders->newEntity();
        $order_detail = $cart_data['order_detail'];

        $this->set(compact('order', 'order_detail', "cart_data"));
        $this->set('_serialize', ['order']);
    }

    public function result($result = null) {
        $this->viewBuilder()->layout('');
        $result = ($result == "successed") ? "注文しました。" : "注文保存する時、BUGがありました";
        $this->set(compact('result'));
        $this->set('_serialize', ['result']);
    }

    //get all of cart data
    public function checkout() {

        $get_session = $this->request->session();

        $order_detail [] = ['product_id' => 1, 'product_name' => 'product a', 'product_num' => 1, 'product_price' => 100, 'product_img' => 'https://s0.2mdn.net/6991651/1-AZR_FY17_quickstart_JA_JP_300x250_BAN_Sept-16.png'];

        $order_detail [] = ['product_id' => 2, 'product_name' => 'product a', 'product_num' => 2, 'product_price' => 200, 'product_img' => 'https://msp.c.yimg.jp/yjimage?q=Kc5b490XyLFM4D0vSKX1jo5QZIcGEnqddZXtGLYkQixbeqION9alHVvqopYzpqtCT2sfgWdQcqyWHGcZNNgZ6mQaqF3nCrtp1sY8KZnbkWnMulUDgu0xilOqk.OdmumekLjUwuR8SUc.Uo34dw--&sig=138a6brbq&x=244&y=206'];

        $get_session->write('user_id', '1');
        $get_session->write('order_address', 'Tokyo');

        $get_session->write('order_tel', '090');
        $get_session->write('order_name', 'mamol');
        $get_session->write('order_email', 'a@abc.com');
        $get_session->write('credit_code', '123');
        $get_session->write('order_detail', $order_detail);
        //create demo data
        $price = 0;
        foreach ($order_detail as $key => $value) {
            $price = $price + $order_detail[$key]['product_num'] * $order_detail[$key]['product_price'];
        }
        $get_session->write('price', $price);
        //total price
        $cart_data = $get_session->read();
        return $cart_data;
    }

    public function add() {

        $geted_datas = $this->request->getData();

        $order_data = $this->checkout();

        $product_detail = $order_data["order_detail"];

        $geted_datas["order_detail"] = $product_detail;

        $orders_table = TableRegistry::get('Orders');

        $order = $orders_table->newEntity();

        $order = $orders_table->patchEntity($order, $geted_datas);



        if ($this->request->is('post') && ($this->request->getData('form_name') == 'orderform')) {

            if ($orders_table->save($order)) {

                $get_session = $this->request->session();
                $get_session->delete('order_detail');

                $result = "successed";

                $this->redirect([$result, 'action' => 'result']);
            }
            $result = "failed";
            $this->redirect([$result, 'action' => 'result']);
        }
        $this->set(compact('orders', "result"));
        $this->set('_serialize', ['orders']);
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function orderDetail($id = null) {
        $this->viewBuilder()->layout('');
        $order = $this->Orders->get($id, [
            'contain' => ['OrderDetail']
        ]);
        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }

}
