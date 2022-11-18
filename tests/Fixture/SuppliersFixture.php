<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SuppliersFixture
 */
class SuppliersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'supllierID' => 1,
                'supplierName' => 'Lorem ipsum dolor sit amet',
                'supplierProductName' => 'Lorem ipsum dolor sit amet',
                'supplierProductQuantity' => 1,
                'supplierSellingPrice' => 1,
                'supplierContact' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
