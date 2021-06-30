<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\Website;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\Website Test Case
 */
class WebsiteTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Entity\Website
     */
    protected $Website;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->Website = new Website();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Website);

        parent::tearDown();
    }
}
