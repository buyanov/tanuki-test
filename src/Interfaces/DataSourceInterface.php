<?php

declare(strict_types=1);

namespace Acme\Interfaces;

interface DataSourceInterface
{
    /**
     * @return array<array>
     */
    public function toArray(): array;
}
