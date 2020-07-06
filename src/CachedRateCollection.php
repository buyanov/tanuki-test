<?php

declare(strict_types=1);

namespace Acme;

use Acme\Interfaces\CacheManagerInterface;
use Acme\Interfaces\CollectionInterface;
use Symfony\Component\VarDumper\Cloner\Data;

class CachedRateCollection extends Collection implements CollectionInterface
{
    /**
     * @var CacheManagerInterface
     */
    private $cacheManager;

    /**
     * @var CollectionInterface
     */
    private $dbCollection;

    public function __construct(CacheManagerInterface $cacheManager, CollectionInterface $collection)
    {
        $this->dbCollection = $collection;
        $this->cacheManager = $cacheManager;

        parent::__construct($this->dbCollection->all());
    }

    /**
     * @param string $key
     *
     * @return float|null
     */
    public function value(string $key): ?float
    {
        return $this->cacheManager->remember($key, function () use ($key) {
            if ($this->dbCollection instanceof DataBaseRateCollection) {
                $this->collection = $this->dbCollection->load()->all();
            }

            return $this->collection[$key];
        });
    }

    /**
     * @return array<float>
     */
    public function all(): array
    {
        return $this->collection;
    }
}
