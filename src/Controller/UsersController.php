<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;


class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['register','logout']);
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
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

                  return $this->redirect(['action' => 'login']);
              }
              $this->Flash->error(__('The user could not be saved. Please, try again.'));
          }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);

    }
    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
}
