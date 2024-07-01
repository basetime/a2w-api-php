<?php

namespace Basetime\A2w;

/**
 * The schedule for the campaign.
 */
class Schedule
{
  use Hydrator;

  /**
   * When the campaign should run.
   */
  public readonly array $when;

  /**
   * The weekday the campaign should run.
   */
  public readonly string $weekday;

  /**
   * The monthday the campaign should run.
   */
  public readonly string $monthday;

  /**
   * The time the campaign should run.
   */
  public readonly string $time;

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
