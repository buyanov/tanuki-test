<?php

declare(strict_types=1);

namespace Acme;

use Acme\Interfaces\CollectionInterface;
use Acme\Interfaces\StorageInterface;
use Acme\Support\DataBaseStorage;

class DataBaseRateCollection extends Collection implements CollectionInterface
{
    /**
     * @var StorageInterface
     */
    private $db;

    public function __construct(StorageInterface $db, CollectionInterface $collection)
    {
        parent::__construct($collection->all());
        $this->db = $db;
    }

    /**
     * @return DataBaseRateCollection
     */
    public function load(): DataBaseRateCollection
    {
        if ($this->db instanceof DataBaseStorage) {
            $this->collection = $this->db->load();
        }

        return $this;
    }

    public function save(): bool
    {
        return $this->db->save($this->all());
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
