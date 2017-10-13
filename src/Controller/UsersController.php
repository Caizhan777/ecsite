<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Mailer\Email;


class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['identification','register']);
    }
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');

        // add と index アクションは常に許可します。
        if (in_array($action, ['register', 'logout', 'identification'])) {
            return true;
        }
        // その他のすべてのアクションは、id を必要とします。
        if (!$this->request->getParam('pass.0')) {
            return false;
        }
        return parent::isAuthorized($user);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if($user['level'] == 0){
                    $this->Flash->error('あなたは正会員ではありません。');
                    return $this->redirect(['action' => 'login']);
                }
                $this->Auth->setUser($user);
                return $this->redirect($this->referer());
            }
            $this->Flash->error('あなたのユーザー名またはパスワードが不正です。');
        }
    }

    public function register()
    {
        $user = $this->Users->newEntity();

        // var_dump($user->user_email);exit();
          if ($this->request->is('post')) {
              $request_data = $this->request->getData();
              // $request_data['user_email'] = $this->request->getData('email');
              // $request_data['user_password'] = $this->request->getData('password');
              // $request_data['user_name'] = $this->request->getData('name');
              // $request_data['user_address'] = $this->request->getData('address');
              // $request_data['user_tel'] = $this->request->getData('telphone');
              //
              // $user = $this->Users->patchEntity($user, $request_data);
              $user->user_email = $request_data['email'];
              $user->user_password = $request_data['password'];
              $user->user_name = $request_data['name'];
              $user->user_address = $request_data['address'];
              $user->user_tel = $request_data['telphone'];
              // var_dump($user);exit();

              if ($this->Users->save($user)) {
                  $this->Flash->success(__('The user has been saved.'));

                  $email = new Email('default');
                  $email->from(['wanghb1324@gmail.com' => 'My Site'])
                      ->to($user->user_email)
                      ->subject('Successful')
                      ->send("亲爱的".$user->user_name."：
                      感谢您在我站注册了新帐号。请点击链接激活您的帐号。
                      http://localhost/ecsite/users/identification/".$user->id."
                      如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问。");

                  return $this->redirect(['action' => 'login']);
              }
              $this->Flash->error(__('The user could not be saved. Please, try again.'));
          }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);

    }
    public function identification($id){
        // if($this->Auth->user()){
        if(floor($id)==$id){
            $this->loadModel('users');
            $user = $this->Users->get($id);
            $user->level = 1;
            if ($this->Users->save($user)) {
                $this->Flash->success('恭喜您注册成功。');
            }else{
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        // }
    }
    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
}
