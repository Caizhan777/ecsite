<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $product_name
 * @property int $product_price
 * @property int $product_num
 * @property string $product_img
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updata
 * @property int $del_flg
 */
class Product extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'product_name' => true,
        'product_price' => true,
        'product_num' => true,
        'product_img' => true,
        'created' => true,
        'del_flg' => true
    ];
}
