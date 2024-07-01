<?php

namespace Basetime\A2w;

/**
 * The stats for the campaign.
 */
class CampaignStats
{
  use Hydrator;

  /**
   * The total Mac devices.
   */
  public readonly int $countMacType;

  /**
   * The total Windows devices.
   */
  public readonly int $countWindowsType;

  /**
   * The total Linux devices.
   */
  public readonly int $countLinuxType;

  /**
   * The total mobile devices.
   */
  public readonly int $countMobileType;

  /**
   * The total desktop devices.
   */
  public readonly int $countDesktopType;

  /**
   * The total wearable devices.
   */
  public readonly int $countWearableType;

  /**
   * The total tablet devices.
   */
  public readonly int $countTabletType;

  /**
   * The total Android devices.
   */
  public readonly int $countAndroidType;

  /**
   * The total iOS devices.
   */
  public readonly int $countIOSType;

  /**
   * The total Windows Phone devices.
   */
  public readonly int $countWinPhoneType;

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
