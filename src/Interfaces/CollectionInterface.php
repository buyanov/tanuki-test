<?php

declare(strict_types=1);

namespace Acme\Interfaces;

interface CollectionInterface
{
    /**
     * @param string $key
     * @return float|null
     */
    public function value(string $key): ?float;

    /**
     * @return array<float>
     */
    public function all(): array;
}
