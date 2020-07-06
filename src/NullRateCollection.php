<?php

declare(strict_types=1);

namespace Acme;

use Acme\Interfaces\CollectionInterface;

class NullRateCollection extends Collection implements CollectionInterface
{

    /**
     * @param string $key
     *
     * @return null|float
     */
    public function value(string $key): ?float
    {
        return null;
    }

    /**
     * @return array<float>
     */
    public function all(): array
    {
        return $this->collection;
    }
}
