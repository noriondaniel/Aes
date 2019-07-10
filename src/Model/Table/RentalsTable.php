<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rentals Model
 *
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\BoxsTable|\Cake\ORM\Association\BelongsTo $Boxs
 * @property \App\Model\Table\WorkersTable|\Cake\ORM\Association\BelongsTo $Workers
 *
 * @method \App\Model\Entity\Rental get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rental newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rental[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rental|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rental saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rental patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rental[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rental findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RentalsTable extends Table
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

        $this->setTable('rentals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Boxs', [
            'foreignKey' => 'box_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Workers', [
            'foreignKey' => 'worker_id',
            'joinType' => 'INNER'
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
            ->naturalNumber('number_of_people',false)
            ->requirePresence('number_of_people', 'create')
            ->allowEmptyString('number_of_people', false);

        $validator
            ->naturalNumber('time',false)
            ->requirePresence('time', 'create')
            ->allowEmptyString('time', false);

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        $validator
            ->requirePresence('client_id', 'create')
            ->allowEmptyString('number_of_people', false);
        
        $validator
            ->requirePresence('box_id', 'create')
            ->allowEmptyString('box_id', false);

        $validator
            ->requirePresence('worker_id', 'create')
            ->allowEmptyString('worker_id', false);
            
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
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        $rules->add($rules->existsIn(['box_id'], 'Boxs'));
        $rules->add($rules->existsIn(['worker_id'], 'Workers'));

        return $rules;
    }
}
