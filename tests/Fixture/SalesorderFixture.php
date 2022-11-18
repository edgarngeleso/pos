<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SalesorderFixture
 */
class SalesorderFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'salesorder';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'salesOrderID' => 1,
                'salesOrderInvoice' => 'Lorem ipsum dolor sit amet',
                'salesOrderProductID' => 1,
                'salesOrderQuantity' => 1,
                'salesOrderAmount' => 1,
                'salesOrderProfit' => 1,
                'salesOrderName' => 'Lorem ipsum dolor sit amet',
                'salesOrderPrice' => 1,
                'salesOrderType' => 'Lorem ipsum dolor sit amet',
                'salesOrderDiscount' => 1,
                'salesOrderDate' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
