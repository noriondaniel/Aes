<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BoxsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BoxsTable Test Case
 */
class BoxsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BoxsTable
     */
    public $Boxs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Boxs',
        'app.Rentals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Boxs') ? [] : ['className' => BoxsTable::class];
        $this->Boxs = TableRegistry::getTableLocator()->get('Boxs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Boxs);

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
}
