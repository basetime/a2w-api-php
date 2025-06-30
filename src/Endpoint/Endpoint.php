<?php

namespace Basetime\A2w\Endpoint;

use Basetime\A2w\RequesterInterface;

/**
 * Parent class for other endpoints.
 */
abstract class Endpoint
{
    /**
     * The requester.
     */
    protected RequesterInterface $requester;

    /**
     * Constructor.
     *
     * @param RequesterInterface $requester The requester.
     */
    public function __construct(RequesterInterface $requester)
    {
        $this->requester = $requester;
    }
}
