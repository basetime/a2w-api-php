<?php

namespace Basetime\A2w;

/**
 * Represents an organization.
 */
class Organization
{
    use Hydrator;

    /**
     * The ID of the organization.
     */
    public readonly string $id;

    /**
     * The name of the organization.
     */
    public readonly string $name;

    /**
     * The URL of the logo.
     */
    public readonly string $logoUrl;

    /**
     * The domain of the organization.
     */
    public readonly Domain | null $domain;

    /**
     * The background color of the organization.
     */
    public readonly string $backgroundColor;

    /**
     * The URL of the favicon 16x16.
     */
    public readonly string $favIcon16;

    /**
     * The URL of the favicon 32x32.
     */
    public readonly string $favIcon32;

    /**
     * The URL of the favicon 48x48.
     */
    public readonly string $favIcon48;

    /**
     * The URL of the favicon 120x120.
     */
    public readonly string $favIcon120;

    /**
     * The URL of the favicon 240x240.
     */
    public readonly string $favIcon240;

    /**
     * The default proximity UUID.
     */
    public readonly string $defaultProximityUUID;

    /**
     * The URL to the terms page, not actually the html!
     */
    public readonly string $termsHtml;

    /**
     * The URL to the privacy page, not actually the html!
     */
    public readonly string $privacyHtml;

    /**
     * The code to add to every page related to the organization.
     */
    public readonly string | null $headerPixels;

    /**
     * The code to add to every page related to the organization.
     */
    public readonly string | null $footerPixels;

    /**
     * The ID of the owner of the organization.
     */
    public readonly string $owner;

    /**
     * The IDs of the admins in the organization.
     */
    public readonly array $admins;

    /**
     * The IDs of the editors in the organization.
     */
    public readonly array $editors;

    /**
     * The join code for the organization.
     */
    public readonly string $joinCode;

    /**
     * Constructor.
     *
     * @param array $values The values to set.
     */
    public function __construct(array $values)
    {
        $this->hydrateProperties($values);
    }
}
