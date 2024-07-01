<?php

use PHPUnit\Framework\TestCase;
use Basetime\A2w\Campaign;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

/**
 * Campaign test.
 */
#[CoversClass(Campaign::class)]
class CampaignTest extends TestCase
{
    #[Test]
    public function testConstruct()
    {
        require('data.php');

        $campaign = new Campaign($campaignData);
        $this->assertEquals($campaignData['id'], $campaign->id);
    }
}
