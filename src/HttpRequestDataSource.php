<?php

declare(strict_types=1);

namespace Acme;

use Acme\Interfaces\DataSourceInterface;
use Acme\Interfaces\HttpClientInterface;

class HttpRequestDataSource implements DataSourceInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var HttpClientInterface
     */
    private $client;

    public function __construct(string $url, HttpClientInterface $httpClient)
    {
        $this->url = $url;
        $this->client = $httpClient;
    }

    public function toArray(): array
    {
        return json_decode($this->client->get($this->url), true);
    }
}
