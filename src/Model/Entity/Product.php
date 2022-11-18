<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $productID
 * @property string $productName
 * @property float $productBuyingPrice
 * @property float $productSellingPrice
 * @property int $productQuantity
 * @property int $supllierID
 * @property string $productImage
 */
class Product extends Entity
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
        'productName' => true,
        'productBuyingPrice' => true,
        'productSellingPrice' => true,
        'productQuantity' => true,
        'supllierID' => true,
        'productImage' => true,
    ];
}
