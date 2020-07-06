<?php

declare(strict_types=1);

namespace Acme\Tests;

use Acme\ExternalRateCollection;
use Acme\HttpRequestDataSource;
use Acme\Support\DataBaseStorage;
use Acme\Support\HttpClient;
use PHPUnit\Framework\TestCase;

class ExternalRateCollectionTest extends TestCase
{
    /**
     * @var ExternalRateCollection
     */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new ExternalRateCollection(
            new HttpRequestDataSource(
                'http://some-test-api.com/rates.json',
                new HttpClient
            )
        );
    }

    public function testCount(): void
    {
        $this->assertCount(2, $this->collection);
    }

    public function testSave(): void
    {
        $db = new DataBaseStorage();
        $this->assertTrue($this->collection->save($db));
    }

    public function testValue(): void
    {
        $this->assertEquals(71.2361, $this->collection->value('USD'));
        $this->assertEquals(82.1974, $this->collection->value('EUR'));
    }

    public function testAll(): void
    {
        $this->assertEquals(['USD' => 71.2361, 'EUR' => 82.1974], $this->collection->all());
    }
}
