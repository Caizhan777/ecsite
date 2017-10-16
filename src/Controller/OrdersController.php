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

    public function confirm() {

        if (!$this->Auth->user()) {
            return $this->redirect([
                        'controller' => 'users',
                        'action' => 'login'
            ]);
        }
        $this->viewBuilder()->layout('');
        //不继承模板
        $cart_data = $this->checkout();
        //获取购物车信息

        $order = $this->Orders->newEntity();

        $order_detail = $cart_data['order_detail'];
        //Get order detail array
        $this->set(compact('order', 'order_detail', "cart_data"));

        $this->set('_serialize', ['order']);
        //Throw variables to ctp
    }

    public function result($result = null) {
        $get_session = $this->request->session();
        $this->viewBuilder()->layout('');
        //Clear the default   ctp
        if ($result == "successed") {
            $get_session->delete('cart.info');
            $get_session->delete('err');
            //删除购物车的session
            $result = "注文が成功しました。";
        } else {
            if ($get_session->read("err")) {
                $result = $get_session->read("err");
            } else {
                $result = "注文保存する時、BUGがありました";
            }
        }
        //Throw  the notice to user
        $this->set(compact('result'));

        $this->set('_serialize', ['result']);
        //Throw to ctp
    }

    public function checkout() {

        $get_user = $this->Auth->user();

        $cart_data["order_name"] = $get_user["user_name"];

        $cart_data["user_id"] = $get_user["id"];

        $cart_data["order_tel"] = $get_user["user_tel"];

        $cart_data["order_email"] = $get_user["user_email"];

        $cart_data["order_address"] = $get_user["user_address"];

        $cart_data["credit_code"] = "";

        //获取用户登录后的信息并转换成可入库的键名
        $get_session = $this->request->session();

        $geted_order_detail = $get_session->read("cart.info");

        $order_detail = [];

        if (count($geted_order_detail) > 0) {

            foreach ($geted_order_detail as $key => $value) {

                $fristArray = $key;

                foreach ($geted_order_detail[$fristArray] as $key => $value) {

                    $order_detail[$fristArray]["Product_id"] = $geted_order_detail[$fristArray]["Product.id"];
                    $order_detail[$fristArray]["product_name"] = $geted_order_detail[$fristArray]["Product.name"];
                    $order_detail[$fristArray]["product_num"] = $geted_order_detail[$fristArray]["Buy.num"];
                    $order_detail[$fristArray]["product_price"] = $geted_order_detail[$fristArray]["Product.price"];
                    $order_detail[$fristArray]["product_img"] = "https://cdn4.iconfinder.com/data/icons/Ethereal_Icons_1/PNGs/File%20Types/php.png";
                    //获取购物车信息并转换成可入库的键名
                }
            }
            $price = 0;
            foreach ($order_detail as $key => $value) {
                $price = $price + $order_detail[$key]['product_num'] * $order_detail[$key]['product_price'];
            }
            $cart_data["price"] = $price;
        } else {
            $cart_data["order_detail"] = null;
        }

        $cart_data["order_detail"] = $order_detail;
        //合并成展示页可用的数组
        return $cart_data;
    }

    public function add() {

        $get_session = $this->request->session();

        //获得数据库对象并整理数据
        if ($this->request->is('post') && ($this->request->getData('form_name') == 'orderform')) {

            $geted_datas = $this->request->getData();
            //获取用户提交上来的数据


            if ($geted_datas["order_address"] == "" || $geted_datas["order_name"] == "" || $geted_datas["order_tel"] == "") {

                $get_session->write("err", "お配送情報が必要です");
                $result = "failed";
                $this->redirect([$result, 'action' => 'result']);
            }

            if ($geted_datas["credit_code"] == "") {
         
                $get_session->write("err", "お支払い情報が必要です");
                $result = "failed";
                $this->redirect([$result, 'action' => 'result']);
            }

            $order_data = $this->checkout();

            $product_detail = $order_data["order_detail"];

            $geted_datas["order_detail"] = $product_detail;

            //获取购物车内商品列表
            $orders_table = TableRegistry::get('Orders');

            $order = $orders_table->newEntity();

            $order = $orders_table->patchEntity($order, $geted_datas);

            if ($orders_table->save($order)) {
                //保存；更新ORDER数据表和ORDER_DETAIL数据表

                $result = "successed";

                $this->redirect([$result, 'action' => 'result']);
                // After Done. Throw the status to ctp for notice only
            }

            $result = "failed";

            $this->redirect([$result, 'action' => 'result']);
            // Throw the failed status to ctp for notice only
        }

        return $this->redirect([$result, 'action' => 'confirm']);

        $this->set(compact('orders', "geted_datas", "result"));
        $this->set('_serialize', ['orders']);
    }

    public function delete($id = null) {

        $this->request->allowMethod(['post', 'delete']);

        $order = $this->Orders->get($id);

        if ($this->Orders->delete($order)) {

            $this->Flash->success(__('削除しました'));
        } else {
            $this->Flash->error(__('バグ'));
        }

        return $this->redirect(['action' => 'admin']);
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
