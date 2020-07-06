<?php

declare(strict_types=1);

namespace Acme\Support;

use Acme\Interfaces\CacheManagerInterface;

class CacheManager implements CacheManagerInterface
{
    /**
     * @var array<mixed>
     */
    private $cache;

    public function __construct()
    {
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function put(string $key, $value): void
    {
        $this->cache[$key] = $value;
    }


    /**
     * @param string $key
     * @param callable $fn
     *
     * @return mixed
     */
    public function remember(string $key, callable $fn)
    {
        if (!isset($this->cache[$key])) {
            $this->put($key, $fn());
        }

        return $this->cache[$key];
    }
}
