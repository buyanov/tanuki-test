<?php

declare(strict_types=1);

namespace Acme\Tests;

use Acme\CachedRateCollection;
use Acme\DataBaseRateCollection;
use Acme\NullRateCollection;
use Acme\Support\CacheManager;
use Acme\Support\DataBaseStorage;
use PHPUnit\Framework\TestCase;

class DataBaseRateCollectionTest extends TestCase
{
    /**
     * @var DataBaseRateCollection
     */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new DataBaseRateCollection(
            new DataBaseStorage,
            new NullRateCollection
        );
    }

    public function testEmpty(): void
    {
        $this->assertCount(0, $this->collection);
    }

    public function testSave(): void
    {
        $this->assertTrue($this->collection->save());
    }

    public function testLoad(): void
    {
        $this->collection->load();
        $this->assertIsArray($this->collection->all());
    }

    public function testValue(): void
    {
        $this->assertEquals(71.6902, $this->collection->load()->value('USD'));
    }
}
