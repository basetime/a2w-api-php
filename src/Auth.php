<?php

namespace Basetime\A2w;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
 * Implements the AuthInterface.
 */
class Auth implements AuthInterface
{
    /**
     * The API key.
     */
    protected string $key;

    /**
     * The API secret.
     */
    protected string $secret;

    /**
     * The base URL.
     */
    protected string $baseUrl;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * The successful last authentication.
     */
    protected Authed | null $authed = null;

    /**
     * Whether or not to verify the SSL certificate.
     */
    protected $verify = true;

    /**
     * The http client.
     */
    protected ClientInterface $http;

    /**
     * Constructor.
     *
     * @param string $key The API key.
     * @param string $secret The API secret.
     * @param string $baseUrl The base URL.
     * @param LoggerInterface $logger The logger to use.
     */
    public function __construct(
        string $key,
        string $secret,
        string $baseUrl,
        LoggerInterface $logger = null
    ) {
        $this->key = $key;
        $this->secret = $secret;
        $this->baseUrl = $baseUrl;
        $this->logger = $logger ? $logger : new NullLogger();
        $this->http = new Client([
            'timeout'  => 5.0,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function setLogger(LoggerInterface $logger): Auth
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * Sets the http client.
     */
    public function setHttpClient(ClientInterface $http): Auth
    {
        $this->http = $http;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getAuthed(): Authed | null
    {
        return $this->authed;
    }

    /**
     * Set whether or not to verify the SSL certificate.
     *
     * @param bool $verify Whether or not to verify the SSL certificate.
     */
    public function setVerify(bool $verify): Auth
    {
        $this->verify = $verify;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function authenticate(): Authed
    {
        if ($this->authed && $this->authed->expiresAt > time()) {
            return $this->authed;
        }

        $this->logger->info('Authenticating with a2w.');

        $body = [
            'key' => $this->key,
            'secret' => $this->secret,
        ];

        $response = $this->http->request('POST', $this->baseUrl . '/api/v1/auth/apiGrant', [
            'json' => $body,
            'verify' => $this->verify,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        $body = json_decode($response->getBody()->getContents(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Failed to parse JSON response');
        }
        if (empty($body['idToken'])) {
            throw new \Exception('Failed to authenticate');
        }
        if (empty($body['refreshToken'])) {
            throw new \Exception('Failed to authenticate');
        }
        if (empty($body['expiresAt'])) {
            throw new \Exception('Failed to authenticate');
        }

        $this->authed = new Authed($body['idToken'], $body['refreshToken'], $body['expiresAt']);

        return $this->authed;
    }
}
