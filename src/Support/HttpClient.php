<?php

declare(strict_types=1);

namespace Acme\Support;

use Acme\Interfaces\HttpClientInterface;

class HttpClient implements HttpClientInterface
{

    /**
     * @param string $url
     *
     * @return string|false
     */
    public function get(string $url)
    {
        return json_encode(['USD' => 71.2361, 'EUR' => 82.1974]);
    }
}
