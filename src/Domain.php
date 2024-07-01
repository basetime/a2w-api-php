<?php

namespace Basetime\A2w;

/**
 * Represents a domain name.
 */
class Domain
{
  use Hydrator;

  /**
   * The ID of the entity.
   */
  public readonly string $id;

  /**
   * The ID of the organization.
   */
  public readonly string $organization;

  /**
   * The name of the organization.
   */
  public readonly string $name;

  /**
   * The domain of the organization.
   */
  public readonly string $domain;

  /**
   * Root domain of the domain
   */
  public readonly string $hostname;

  /**
   * The URL to the homepage redirect.
   */
  public readonly string $homepageRedirectUrl;

  /**
   * Value for CNAME Record Validation => GUID.domain.com.
   */
  public readonly string $cNameVerification;

  /**
   * The CNAME Record Name
   */
  public readonly string $cNameDomain;

  /**
   * Processing Status
   */
  public readonly bool $isProcessing;

  /**
   * Validation Status
   */
  public readonly string $status;

  /**
   * Is Active Domain
   */
  public readonly bool $isActive;

  /**
   * Is Active Domain
   */
  public readonly bool $isDeleted;

  /**
   * Validation Date
   */
  public readonly \DateTime | null $validationDate;

  /**
   * First time domain validity was checked
   */
  public readonly \DateTime $firstChecked;

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
