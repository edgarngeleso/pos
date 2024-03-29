<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
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
                'productID' => 1,
                'productName' => 'Lorem ipsum dolor sit amet',
                'productBuyingPrice' => 1,
                'productSellingPrice' => 1,
                'productQuantity' => 1,
                'supllierID' => 1,
                'productImage' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
