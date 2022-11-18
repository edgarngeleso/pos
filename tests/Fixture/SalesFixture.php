<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SalesFixture
 */
class SalesFixture extends TestFixture
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
                'saleID' => 1,
                'saleInvoiceNumber' => 'Lorem ipsum dolor sit amet',
                'saleCashier' => 'Lorem ipsum dolor sit amet',
                'saleDate' => 'Lorem ipsum dolor sit amet',
                'saleType' => 'Lorem ipsum dolor sit amet',
                'saleAmount' => 'Lorem ipsum dolor sit amet',
                'saleProfit' => 'Lorem ipsum dolor sit amet',
                'balance' => 1,
            ],
        ];
        parent::init();
    }
}
