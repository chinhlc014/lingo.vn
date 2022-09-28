<?php

namespace App\Services\Crawl;

use GuzzleHttp\Client;

/**
 * Class CrawlBaseService
 *
 * @package Modules\Crawl\Services
 */
class CrawlBaseService
{
    /**
     * @var Client
     */
    public $httpClient = null;

    /**
     * Get guzzle http client.
     *
     * @return Client
     */
    public function httpClient(): ?Client
    {
        if ($this->httpClient) {
            return $this->httpClient;
        }
        $this->httpClient = new Client();

        return $this->httpClient;
    }
}
