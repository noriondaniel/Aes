<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ballots Model
 *
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\PurchasesTable|\Cake\ORM\Association\HasMany $Purchases
 *
 * @method \App\Model\Entity\Ballot get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ballot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ballot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ballot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ballot saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ballot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ballot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ballot findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BallotsTable extends Table
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

        $this->setTable('ballots');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Purchases', [
            'foreignKey' => 'ballot_id'
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
            ->requirePresence('client_id', 'create')
            ->allowEmptyDateTime('client_id', false);

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

        return $rules;
    }
}
