<?php

namespace App\Model\Table;


use Cake\ORM\Table;
use Cake\Event\EventInterface;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class ArticlesTable extends Table 
{
    public function initialize(array $config): void
    {
        $this->addbehavior('Timestamp');
        //$this->setPrimaryKey('article_id');
    }

    public function beforeSave(EventInterface $event, $entity, $options)
    {
        if(($entity->isNew()) && !($entity->slug))
        {
            $sluggedTitle = Text::slug($entity->title);
            $entity->slug = substr($sluggedTitle, 0, 191);
        }

    }


    public function validationDefault(validator $validator): Validator 
    {
        $validator
            ->notEmptyString('title', 'Ce champ est vide')
            ->minLength('title',10, '10 caractère minimum')
            ->maxLength('title',255, '255 caractère minimum')

            ->notEmptyString('body')
            ->minLength('body', 10);
        return $validator; 

    }


}

?>
