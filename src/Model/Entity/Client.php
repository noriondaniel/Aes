<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $dni
 * @property int $cell_phone_number
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Ballot[] $ballots
 * @property \App\Model\Entity\Punishment[] $punishments
 * @property \App\Model\Entity\Rental[] $rentals
 * @property \App\Model\Entity\Reservation[] $reservations
 */
class Client extends Entity
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
        'user_id' => true,
        'dni' => true,
        'cell_phone_number' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'ballots' => true,
        'punishments' => true,
        'rentals' => true,
        'reservations' => true
    ];
}
