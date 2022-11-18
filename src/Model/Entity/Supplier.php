<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Supplier Entity
 *
 * @property int $supllierID
 * @property string $supplierName
 * @property string $supplierProductName
 * @property int $supplierProductQuantity
 * @property float $supplierSellingPrice
 * @property string $supplierContact
 */
class Supplier extends Entity
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
        'supplierName' => true,
        'supplierProductName' => true,
        'supplierProductQuantity' => true,
        'supplierSellingPrice' => true,
        'supplierContact' => true,
    ];
}
