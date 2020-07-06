<?php

declare(strict_types=1);

namespace Acme\Interfaces;

interface StorageInterface
{
    /**
     * @param array<mixed> $data
     *
     * @return bool
     */
    public function save(array $data): bool;

    /**
     * @return array<mixed>
     */
    public function load(): ?array;
}
