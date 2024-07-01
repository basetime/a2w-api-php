<?php

namespace Basetime\A2w;

/**
 * Represents a user.
 */
class User
{
  use Hydrator;

  /**
   * The ID of the user.
   */
  public readonly string $id;

  /**
   * The display name of the user.
   */
  public readonly string $displayName;

  /**
   * The email address of the user.
   */
  public readonly string $email;

  /**
   * The avatar URL of the user.
   */
  public readonly string $photoURL;

  /**
   * The color of the user's avatar.
   */
  public readonly string $avatarColor;

  /**
   * The organizations the user belongs to.
   */
  public readonly array $organizations;

  /**
   * The display names of the organizations the user belongs to.
   */
  public readonly array $clientsDisplay;

  /**
   * The date the user last logged in.
   */
  public readonly \DateTime $dateLastLogin;

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
