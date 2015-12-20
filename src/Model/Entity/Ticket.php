<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property string $seat_name
 * @property string $seat_status
 * @property int $price
 * @property int $event_id
 * @property \App\Model\Entity\Event $event
 * @property int $room_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Ticket extends Entity
{
    private $seat_statuses = array('free'=>'Свободно', 'booked'=>'Забронирован', 'canceled'=>'Отменен', 'paid'=>'Оплачен');
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
        '*' => true,
        'id' => false,
    ];

    public function enumSeatStatus() {
        $name = $this->seat_status;
        return $this->seat_statuses[$name];
    }
}
