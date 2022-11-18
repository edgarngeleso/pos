<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $saleID
 * @property string $saleInvoiceNumber
 * @property string $saleCashier
 * @property string $saleDate
 * @property string $saleType
 * @property string $saleAmount
 * @property string $saleProfit
 * @property float $balance
 */
class Sale extends Entity
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
        'saleInvoiceNumber' => true,
        'saleCashier' => true,
        'saleDate' => true,
        'saleType' => true,
        'saleAmount' => true,
        'saleProfit' => true,
        'balance' => true,
    ];
}
