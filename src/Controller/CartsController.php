<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;

class CartsController extends AppController
{
  public function initialize()
  {
      parent::initialize();
      $this->Auth->allow(['index']);
  }
  public function index(){

  }
}
