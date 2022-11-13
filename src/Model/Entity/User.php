<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $userID
 * @property string $userName
 * @property string $userPassword
 * @property bool $isAdmin
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'userName' => true,
        'userPassword' => true,
        'isAdmin' => true,
    ];

    protected function _setPassword($userPassword){
        if(strlen($userPassword) > 0){
            return (new DefaultPasswordHasher)->hash($userPassword);
        }
    }
}
