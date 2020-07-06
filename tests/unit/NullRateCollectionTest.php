<?php

declare(strict_types=1);

namespace Acme\Tests;

use Acme\NullRateCollection;
use PHPUnit\Framework\TestCase;

class NullRateCollectionTest extends TestCase
{
    /**
     * @var NullRateCollection
     */
    protected $nullRateCollection;

    protected function setUp(): void
    {
        $this->nullRateCollection = new NullRateCollection();
    }

    public function testEmpty(): void
    {
        $this->assertCount(0, $this->nullRateCollection);
    }

    public function testValue(): void
    {
        $this->assertEquals(null, $this->nullRateCollection->value('key'));
    }
}
