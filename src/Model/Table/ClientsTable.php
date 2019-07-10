<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clients Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\BallotsTable|\Cake\ORM\Association\HasMany $Ballots
 * @property \App\Model\Table\PunishmentsTable|\Cake\ORM\Association\HasMany $Punishments
 * @property \App\Model\Table\RentalsTable|\Cake\ORM\Association\HasMany $Rentals
 * @property \App\Model\Table\ReservationsTable|\Cake\ORM\Association\HasMany $Reservations
 *
 * @method \App\Model\Entity\Client get($primaryKey, $options = [])
 * @method \App\Model\Entity\Client newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Client[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClientsTable extends Table
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

        $this->setTable('clients');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Ballots', [
            'foreignKey' => 'client_id'
        ]);
        $this->hasMany('Punishments', [
            'foreignKey' => 'client_id'
        ]);
        $this->hasMany('Rentals', [
            'foreignKey' => 'client_id'
        ]);
        $this->hasMany('Reservations', [
            'foreignKey' => 'client_id'
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
            ->allowEmptyString('user_id', false);
        
        $validator
            ->naturalNumber('dni',false)
            ->scalar('dni')
            ->maxLength('dni', 8)
            ->minLength('dni', 8)
            ->requirePresence('dni', 'create')
            ->allowEmptyString('dni', false);
        
        $validator
            ->naturalNumber('cell_phone_number',false)
            ->maxLength('cell_phone_number', 9)
            ->minLength('cell_phone_number', 9)
            ->requirePresence('cell_phone_number', 'create')
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
        $rules->add($rules->isUnique(['dni']));
        $rules->add($rules->isUnique(['cell_phone_number']));
        return $rules;
    }
}
