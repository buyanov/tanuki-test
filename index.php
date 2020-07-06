<?php

require_once __DIR__ . '/bootstrap.php';

use Acme\CachedRateCollection;
use Acme\DataBaseRateCollection;
use Acme\NullRateCollection;
use Acme\Support\DataBaseStorage;
use Acme\Support\CacheManager;


$rates = (new CachedRateCollection(
    new CacheManager,
    (new DataBaseRateCollection(
        new DataBaseStorage,
        new NullRateCollection
    ))->load()
))->all();

var_dump($rates);