<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Boxs Model
 *
 * @property \App\Model\Table\RentalsTable|\Cake\ORM\Association\HasMany $Rentals
 *
 * @method \App\Model\Entity\Box get($primaryKey, $options = [])
 * @method \App\Model\Entity\Box newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Box[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Box|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Box saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Box patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Box[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Box findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BoxsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('boxs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Rentals', [
            'foreignKey' => 'box_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        return $validator;
    }
}
