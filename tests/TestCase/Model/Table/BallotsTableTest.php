<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BallotsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BallotsTable Test Case
 */
class BallotsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BallotsTable
     */
    public $Ballots;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Ballots',
        'app.Clients',
        'app.Purchases'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ballots') ? [] : ['className' => BallotsTable::class];
        $this->Ballots = TableRegistry::getTableLocator()->get('Ballots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ballots);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
