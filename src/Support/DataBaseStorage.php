<?php

declare(strict_types=1);

namespace Acme\Support;

use Acme\Interfaces\StorageInterface;

class DataBaseStorage implements StorageInterface
{
    /**
     * @var array<mixed>
     */
    private $storage = [
        'USD' => 71.6902,
        'EUR' => 83.3023
    ];

    /**
     * @param array<mixed> $data
     *
     * @return bool
     */
    public function save(array $data): bool
    {
        $this->storage = $data;
        return true;
    }

    /**
     * @return array<mixed>|null
     */
    public function load(): ?array
    {
        return $this->storage;
    }
}
