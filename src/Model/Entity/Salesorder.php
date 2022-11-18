<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Salesorder Entity
 *
 * @property int $salesOrderID
 * @property string $salesOrderInvoice
 * @property int $salesOrderProductID
 * @property int $salesOrderQuantity
 * @property float $salesOrderAmount
 * @property float $salesOrderProfit
 * @property string $salesOrderName
 * @property float $salesOrderPrice
 * @property string $salesOrderType
 * @property float $salesOrderDiscount
 * @property string $salesOrderDate
 */
class Salesorder extends Entity
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
        'salesOrderInvoice' => true,
        'salesOrderProductID' => true,
        'salesOrderQuantity' => true,
        'salesOrderAmount' => true,
        'salesOrderProfit' => true,
        'salesOrderName' => true,
        'salesOrderPrice' => true,
        'salesOrderType' => true,
        'salesOrderDiscount' => true,
        'salesOrderDate' => true,
    ];
}
