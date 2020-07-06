#!/bin/php
<?php

// ini_set('max_execution_time', 5);

require_once __DIR__ . '/bootstrap.php';

use Acme\DataBaseRateCollection;
use Acme\HttpRequestDataSource;
use Acme\ExternalRateCollection;
use Acme\Support\HttpClient;
use Acme\Support\DataBaseStorage;

(new DataBaseRateCollection(
    new DataBaseStorage,
    new ExternalRateCollection(
        new HttpRequestDataSource(
            'https://some-bank.com/api/rates.json',
            new HttpClient
        )
    )
))->save();
