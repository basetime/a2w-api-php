<?php

namespace Basetime\A2w;

/**
 * Represents a class that can make HTTP requests to the a2w API.
 */
interface RequesterInterface
{
    /**
     * Sends a request using the fetcher and returns the response.
     *
     * Adds the bearer token to the headers and catches errors.
     *
     * @param method The HTTP method to use.
     * @param url The url to send the request to.
     * @param options The fetch options.
     */
    public function fetch(string $method, string $url, array $options = []): mixed;
}
