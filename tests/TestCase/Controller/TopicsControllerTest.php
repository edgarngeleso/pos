<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\TopicsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\TopicsController Test Case
 *
 * @uses \App\Controller\TopicsController
 */
class TopicsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Topics',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\TopicsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test viewTopic method
     *
     * @return void
     * @uses \App\Controller\TopicsController::viewTopic()
     */
    public function testViewTopic(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test addTopic method
     *
     * @return void
     * @uses \App\Controller\TopicsController::addTopic()
     */
    public function testAddTopic(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test editTopic method
     *
     * @return void
     * @uses \App\Controller\TopicsController::editTopic()
     */
    public function testEditTopic(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test deleteTopic method
     *
     * @return void
     * @uses \App\Controller\TopicsController::deleteTopic()
     */
    public function testDeleteTopic(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
