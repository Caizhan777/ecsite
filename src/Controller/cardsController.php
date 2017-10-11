<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;
use App\Form\SearchFuriruForm;
use App\Form\SearchMerukariForm;
use App\Form\SearchRakumaForm;
use App\Model\Table\MerukariTable;
use Cake\ORM\TableRegistry;
use App\Model\Table\RakumaTable;
use App\Model\Table\FuriruTable;

use App\Model\Table\cardTable;
class cardsController extends AppController
{
	/**
    *by lin
    *版本 1.0
    *功能 从session里面获取商品信息
    * 
    */
    public function xiesession(){
        //本方法是模拟购物车的数据，往session里面写入测试代码
        //访问xiesession的地址加入session
        $cart[0]['Product.id']=0;
        $cart[0]['buy.num']=2;
        $cart[0]['name']='牙刷';
        $cart[0]['jiage']=250;
        $cart[1]['Product.id']=1;
        $cart[1]['buy.num']=3;
        $cart[1]['name']='毛线';
        $cart[1]['jiage']=222;
        $cart[2]['Product.id']=2;
        $cart[2]['buy.num']=2;
        $cart[2]['name']='黄瓜';
        $cart[2]['jiage']=2333;
        $cart[3]['Product.id']=3;
        $cart[3]['buy.num']=1;
        $cart[3]['name']='西红柿';
        $cart[3]['jiage']=242;
        $cart[4]['Product.id']=4;
        $cart[4]['buy.num']=3;
        $cart[4]['name']='豆腐';
        $cart[4]['jiage']=212;
        $cart[5]['Product.id']=5;
        $cart[5]['buy.num']=1;
        $cart[5]['name']='番茄';
        $cart[5]['jiage']=233;
        $cart[6]['Product.id']=6;
        $cart[6]['buy.num']=2;
        $cart[6]['name']='番茄和西红柿有什么区别';
        $cart[6]['jiage']=2222;
        $cart[7]['Product.id']=7;
        $cart[7]['buy.num']=3;
        $cart[7]['name']='没区别';
        $cart[7]['jiage']=21;
        $cart[8]['Product.id']=8;
        $cart[8]['buy.num']=2;
        $cart[8]['name']='好吧';
        $cart[8]['jiage']=232;
        $cart[9]['Product.id']=9;
        $cart[9]['buy.num']=1;
        $cart[9]['name']='完了';
        $cart[9]['jiage']=212;
        
        
        $this->request->session()->write('cart.info',$cart);
        return $this->redirect(['action' => 'Obtain']);

    }
    public function Obtain() {
    	$session = $this->request->session();
        //导出session里面的数据

        //获取商品种类的数量
        // $quantity=null;
        // if($session->check('quantity')){
        //     $quantity=$session->read('quantity');
        // }
        //cart.info
        $cart=$this->request->session()->read('cart.info');
        
        //获取商品id
        // $merchandiseid[]=null;
        // if($cart[$id]['Product.id']!=null){
        //     for($i=0;$i<count($cart)-1;$i++){
               
        //     }
            
        // }                          


        // //获取商品的数量
        // $merchandise_quantity[]=null;
        // if($cart[$id]['buy.num']!=null){
            
        //         }  
        //     }
            
        // }
        
        
        // $this->request->session()->write('Config.language','22');
        
        // $this->request->session()->read('Config.language');
        //获取用户id
        // $userid=null;
        // if($this->Auth->user()){
        //     $userid=$this->auth->user()['id'];
        // }else{
            // 在appcontroller里面设定也是可以的，保险起见还是做一个判断
            // return $this->redirect(['Controller'=>'Users','action' => 'login']);
        // }

        
        
        // 购物车没有东西的时候
        if($cart==null){
            return $this->redirect(['action' => 'notmerchandise']);
        }
        
            
        $this->set(compact('cart'));
        
    }

    public function notmerchandise(){

        $this->Flash->error(__('购物车里面什么都没有'));

    }




    public function delete($id=null){
        $session = $this->request->session();
        //下面是要获取的session数据
        $ling=$session->read('cart.info');
        if(isset($ling[$id])){
            if($this->ling($ling, $id)){
                $this->Flash->error(__('删除成功'));
                return $this->redirect(['action' => 'Obtain']);
            }
            $this->Flash->error(__('删除失败'));
            return $this->redirect(['action' => 'Obtain']);
        }
        $this->Flash->error(__('未找到该物品'));
        return $this->redirect(['action' => 'Obtain']);        



        // 判断session里面是否有www
        // if($session->check('www')){
        //     //aa是一个零时的值，你看着修改一下
        //     $aa=$this->request->session()->read('www');
        // }
        
        // //$id是你选的物品的id
        // $aa[]=$id;
        // //www是session的名字，看您喜欢的修改
        // $this->request->session()->write('www',$aa);
        // //打印数据
        // var_dump($this->request->session()->read($aa));
    }
    public function addreduce($judge=null,$id=null){

        if($judge=='add'){
            $session = $this->request->session();
            if($session->check('cart.info')){
                //aa是一个零时的值，你看着修改一下
                $aa=$this->request->session()->read('cart.info');
                //$id是你选的物品的id
                $aa[$id]['buy.num']=$aa[$id]['buy.num']+1;
                //www是session的名字，看您喜欢的修改
                $this->request->session()->write('cart.info',$aa);
                $this->Flash->error(__('修改成功'));
                return $this->redirect(['action' => 'Obtain']);
            }
        
            
              
        }elseif($judge=='reduce') {
            $session = $this->request->session();
            if($session->check('cart.info')){
                //aa是一个零时的值，你看着修改一下
                $aa=$this->request->session()->read('cart.info');
                //$id是你选的物品的id
                if($aa[$id]['buy.num']==1){
                    $this->Flash->error(__('操作错误'));
                    return $this->redirect(['action' => 'Obtain']);
                }
                $aa[$id]['buy.num']=$aa[$id]['buy.num']-1;
                //www是session的名字，看您喜欢的修改
                $this->request->session()->write('cart.info',$aa);
                $this->Flash->error(__('修改成功'));
                return $this->redirect(['action' => 'Obtain']);
            }
        
            
        }else{
            $this->Flash->error(__('操作错误'));
            return $this->redirect(['action' => 'Obtain']);
        }

    }


    public function ling($ling,$id){
        $session = $this->request->session();
        $ling2=$ling;
        $aa=array_splice($ling, $id,1);
        if($ling2[$id]==$aa[0]){
            $this->request->session()->write('cart.info',$ling);
            return true;
        }
        return false;
    } 
}