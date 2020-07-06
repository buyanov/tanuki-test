<?php

declare(strict_types=1);

namespace Acme\Interfaces;

interface CacheManagerInterface
{
    /**
     * @param string $key
     * @param callable $fn
     *
     * @return mixed
     */
    public function remember(string $key, callable $fn);
}