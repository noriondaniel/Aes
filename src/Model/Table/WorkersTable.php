<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Workers Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RentalsTable|\Cake\ORM\Association\HasMany $Rentals
 *
 * @method \App\Model\Entity\Worker get($primaryKey, $options = [])
 * @method \App\Model\Entity\Worker newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Worker[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Worker|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Worker saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Worker patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Worker[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Worker findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WorkersTable extends Table
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

        $this->setTable('workers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Rentals', [
            'foreignKey' => 'worker_id'
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
            ->requirePresence('user_id', 'create')
            ->allowEmptyDateTime('user_id', false);

        $validator
            ->scalar('turn')
            ->maxLength('turn', 50)
            ->requirePresence('turn', 'create')
            ->allowEmptyString('turn', false);

        $validator
            ->naturalNumber('cell_phone_number',false)
            ->requirePresence('cell_phone_number', 'create')
            ->maxLength('cell_phone_number', 9)
            ->minLength('cell_phone_number', 9)
            ->allowEmptyString('cell_phone_number', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->isUnique(['user_id']));
        return $rules;
    }
}
