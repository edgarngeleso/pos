<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalesorderTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalesorderTable Test Case
 */
class SalesorderTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SalesorderTable
     */
    protected $Salesorder;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Salesorder',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Salesorder') ? [] : ['className' => SalesorderTable::class];
        $this->Salesorder = $this->getTableLocator()->get('Salesorder', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Salesorder);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SalesorderTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
