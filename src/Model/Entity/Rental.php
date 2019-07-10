<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rental Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $box_id
 * @property int $worker_id
 * @property int $number_of_people
 * @property int $time
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Box $box
 * @property \App\Model\Entity\Worker $worker
 */
class Rental extends Entity
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
        'client_id' => true,
        'box_id' => true,
        'worker_id' => true,
        'number_of_people' => true,
        'time' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'client' => true,
        'box' => true,
        'worker' => true
    ];
}
