<?php

declare(strict_types=1);

namespace Acme\Interfaces;

interface HttpClientInterface
{
    /**
     * @param string $url
     *
     * @return mixed
     */
    public function get(string $url);
}
