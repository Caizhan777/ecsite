<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;


class SearchProductForm extends Form
{


    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('form_name', ['type' => 'string'])
            //キーワード
            ->addField('key_words', ['type' => 'longtext'])

            //カテゴリ
            ->addField('category_id', ['type' => 'int']);
    }
}
?>
