<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\EntityInterface;
use App\Model\Entity\Order;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Association\BelongsTo;
use Cake\Utility\Text;
use ArrayObject;

class OrdersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);
        $this->setTable('orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('OrderDetail', [
            'foreignKey' => 'order_id',
            'dependent' => true
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator) {
      $validator
          ->integer('id')
          ->allowEmpty('id', 'create');

      $validator
          ->integer('user_id')
          ->allowEmpty('user_id', 'create');

      $validator
          ->requirePresence('order_email', 'create')
          ->notEmpty('user_email');


      $validator
          ->requirePresence('credit_code', 'create')
          ->notEmpty('credit_code');

      $validator
          ->requirePresence('order_tel', 'create')
          ->notEmpty('user_tel');

      $validator
          ->requirePresence('order_address', 'create')
          ->notEmpty('user_address');

      $validator
          ->requirePresence('order_name', 'create')
          ->notEmpty('user_name');

      $validator
          ->dateTime('updata')
          ->allowEmpty('updata', 'create');


      $validator
          ->integer('del_flg')
          ->requirePresence('del_flg', 'create')
          ->notEmpty('del_flg');

      $validator
          ->integer('buy_status')
          ->requirePresence('buy_status', 'create')
          ->notEmpty('buy_status');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param RulesChecker $rules The rules object to be modified.
     * @return RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        return $rules;
    }

}
