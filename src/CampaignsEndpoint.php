<?php

namespace Basetime\A2w;

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
     * Returns the url.
     *
     * @param string $path The path.
     */
    private function getUrl(string $path)
    {
        return self::endpoint . '/' . $path;
    }
}
