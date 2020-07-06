<?php

declare(strict_types=1);

namespace Acme;

use Acme\Interfaces\CollectionInterface;
use Acme\Interfaces\DataSourceInterface;
use Acme\Interfaces\StorageInterface;

class ExternalRateCollection extends Collection implements CollectionInterface
{
    public function __construct(DataSourceInterface $dataSource)
    {
        parent::__construct($dataSource->toArray());
    }

    public function save(StorageInterface $storage): bool
    {
        return $storage->save($this->collection);
    }

    public function value(string $key): ?float
    {
        return $this->collection[$key];
    }

    public function all(): array
    {
        return $this->collection;
    }
}
