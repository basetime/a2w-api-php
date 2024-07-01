<?php

namespace Basetime\A2w;

use Psr\Log\LoggerInterface;
use GuzzleHttp\ClientInterface;

/**
 * Authenticates the with the a2w API.
 *
 * Used to make authentication requests to a2w in order to obtain tokens. The
 * tokens will be used for future requests to the API.
 */
interface AuthInterface
{
    /**
     * Set the logger.
     *
     * @param LoggerInterface $logger The logger to use.
     */
    public function setLogger(LoggerInterface $logger): AuthInterface;

    /**
     * Sets the http client.
     */
    public function setHttpClient(ClientInterface $http): AuthInterface;

    /**
     * Returns the last successful authentication.
     */
    public function getAuthed(): Authed | null;

    /**
     * Retreives an id token from the a2w API.
     *
     * This method will authenticate with the a2w API and return the id token. It
     * stores the response in the `authed` property. Use the getAuthed method to
     * retrieve the last successful authentication.
     *
     * @return The authentication response.
     */
    public function authenticate(): Authed;
}
