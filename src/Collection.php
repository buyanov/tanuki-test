<?php

declare(strict_types=1);

namespace Acme;

use Countable;

abstract class Collection implements Countable
{
    /**
     * @var array<mixed>
     */
    protected $collection;

    /**
     * Collection constructor.
     * @param array<mixed> $collection
     */
    public function __construct(array $collection = [])
    {
        $this->collection = $collection;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->collection);
    }
}
