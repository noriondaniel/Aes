<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Punishments Model
 *
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 *
 * @method \App\Model\Entity\Punishment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Punishment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Punishment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Punishment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Punishment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Punishment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Punishment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Punishment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PunishmentsTable extends Table
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

        $this->setTable('punishments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
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
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        $validator
            ->scalar('type')
            ->maxLength('type', 50)
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

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
