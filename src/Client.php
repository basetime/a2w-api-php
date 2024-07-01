<?php

namespace Basetime\A2w;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use GuzzleHttp\ClientInterface;

/**
 * Client class that communicates with the the addtowallet API.
 */
class Client implements RequesterInterface
{
    /**
     * The base URL.
     */
    const baseUrl = 'https://app.addtowallet.io';

    /**
     * The loggert to use.
     */
    protected LoggerInterface $logger;

    /**
     * The auth object.
     */
    protected AuthInterface $auth;

    /**
     * The http client.
     */
    protected ClientInterface $http;

    /**
     * The campaigns endpoint.
     */
    public readonly CampaignsEndpoint $campaigns;

    /**
     * The claims endpoint.
     */
    public readonly ClaimsEndpoint $claims;

    /**
     * Constructor.
     *
     * @param LoggerInterface $logger The logger to use.
     */
    public function __construct(string $key, string $secret,  LoggerInterface $logger = null)
    {
        $this->http = new \GuzzleHttp\Client([
            'timeout'  => 5.0,
        ]);
        $this->logger = $logger ? $logger : new NullLogger();
        $this->auth = new Auth($key, $secret, self::baseUrl, $this->logger);
        $this->campaigns = new CampaignsEndpoint($this);
        $this->claims = new ClaimsEndpoint($this);
    }

    /**
     * Sets the auth object.
     */
    public function setAuth(AuthInterface $auth): Client
    {
        $this->auth = $auth;
        $this->auth->setLogger($this->logger);
        $this->auth->setHttpClient($this->http);

        return $this;
    }

    /**
     * Sets the http client.
     */
    public function setHttpClient(ClientInterface $http): Client
    {
        $this->http = $http;
        $this->auth->setHttpClient($http);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function fetch(string $method, string $url, array $options = []): mixed
    {
        $url = self::baseUrl . $url;
        $this->logger->info(sprintf('%s %s', strtoupper($method), $url));

        // Adds the authentication headers, and ensures the required headers are set.
        $authed = $this->auth->authenticate();
        if (empty($options['headers'])) {
            $options['headers'] = [];
        }
        $options['headers']['Authorization'] = 'Bearer ' . $authed->idToken;

        if (empty($options['headers']['Accept'])) {
            $options['headers']['Accept'] = 'application/json';
        }
        if (empty($options['headers']['Content-Type'])) {
            $options['headers']['Content-Type'] = 'application/json';
        }

        // Sends the request and decodes the response.
        $response = $this->http->request($method, $url, $options);
        $body = $response->getBody();
        if ($options['headers']['Accept'] === 'application/json') {
            $data = json_decode($body, true);
        } else {
            $data = $body;
        }

        return $data;
    }
}
