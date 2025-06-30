<?php

namespace Basetime\A2w\Endpoint;

/**
 * Communicate with the campaigns endpoints.
 */
class CampaignsEndpoint extends Endpoint
{
    /**
     * The endpoint.
     */
    const endpoint = '/api/v1/campaigns';

    /**
     * Returns the passes for a campaign.
     *
     * @param string $campaignId The ID of the campaign.
     * @return The passes.
     */
    public function getPasses(string $campaignId)
    {
        $url = $this->getUrl($campaignId . '/passes');

        return $this->requester->fetch('GET', $url);
    }

    /**
     * Sets the redeemed status of a pass to true.
     *
     * @param string $campaignId The ID of the campaign.
     * @param string $passId The ID of the pass.
     */
    public function redeemPass(string $campaignId, string $passId)
    {
        $url = $this->getUrl($campaignId . '/passes/' . $passId . '/redeem');

        return $this->requester->fetch('POST', $url);
    }

    /**
     * Returns the redeemed status of a pass.
     *
     * @param string $campaignId The ID of the campaign.
     * @param string $passId The ID of the pass.
     */
    public function getRedeemedStatus(string $campaignId, string $passId)
    {
        $url = $this->getUrl($campaignId . '/passes/' . $passId . '/redeemed');

        return $this->requester->fetch('GET', $url);
    }

    /**
     * Returns the url.
     *
     * @param string $path The path.
     */
    private function getUrl(string $path)
    {
        return self::endpoint . '/' . $path;
    }
}
