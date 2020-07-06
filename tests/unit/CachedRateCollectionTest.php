<?php

declare(strict_types=1);

namespace Acme\Tests;

use Acme\CachedRateCollection;
use Acme\DataBaseRateCollection;
use Acme\NullRateCollection;
use Acme\Support\CacheManager;
use Acme\Support\DataBaseStorage;
use PHPUnit\Framework\TestCase;

class CachedRateCollectionTest extends TestCase
{
    /**
     * @var CachedRateCollection
     */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new CachedRateCollection(
            new CacheManager,
            new NullRateCollection
        );
    }

    public function testEmpty(): void
    {
        $this->assertCount(0, $this->collection);
    }

    public function testValue(): void
    {
        $collection = new CachedRateCollection(
            new CacheManager,
            new DataBaseRateCollection(
                new DataBaseStorage(),
                new NullRateCollection()
            )
        );
        $this->assertEquals('71.6902', $collection->value('USD'));
    }

    public function testAll(): void
    {
        $this->assertCount(0, $this->collection->all());
    }
}
