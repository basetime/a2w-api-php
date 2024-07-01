<?php

namespace Basetime\A2w;

/**
 * Represents the response from the auth endpoint.
 */
class Authed
{
    /**
     * The ID token.
     */
    public readonly string $idToken;

    /**
     * The refresh token.
     */
    public readonly string $refreshToken;

    /**
     * The expires at timestamp.
     */
    public readonly int $expiresAt;

    /**
     * Constructor.
     *
     * @param string $idToken The ID token.
     * @param string $refreshToken The refresh token.
     * @param int $expiresAt The expires at timestamp.
     */
    public function __construct(string $idToken, string $refreshToken, int $expiresAt)
    {
        $this->idToken = $idToken;
        $this->refreshToken = $refreshToken;
        $this->expiresAt = $expiresAt;
    }
}
