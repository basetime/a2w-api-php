<?php

namespace Basetime\A2w;

/**
 * The details of a campaign.
 */
class Campaign
{
    use Hydrator;

    /**
     * The ID of the campaign.
     */
    public readonly string | null $id;

    /**
     * When the campaign launched, null if not running.
     */
    public readonly \DateTime | null $runningDate;

    /**
     * The name of the campaign.
     */
    public readonly string $name;

    /**
     * The organization that owns the campaign.
     */
    public readonly Organization $organization;

    /**
     * The template used by the campaign.
     */
    public readonly Template $template;

    /**
     * The ID of the landing page.
     */
    public readonly string $landingPage;

    /**
     * The name of the primary key to save from imported csv data.
     */
    public readonly string $primaryKey;

    /**
     * The description of the campaign.
     */
    public readonly string $description;

    /**
     * Code added to the head of the claims page.
     */
    public readonly string $headerPixels;

    /**
     * Code added to the footer of the claims page.
     */
    public readonly string $footerPixels;

    /**
     * Is anyone allowed to join the campaign?
     */
    public readonly bool $openEnrollment;

    /**
     * The ID of the landing page for open enrollment.
     */
    public readonly string $openEnrollmentLandingPage;

    /**
     * The permalink to the open enrollment page.
     */
    public readonly string $openEnrollmentPermalink;

    /**
     * The auto-submit jwt secret.
     *
     * The form values for open enrollment may be passed as query params. They may
     * also be passed as a JWT token. This secret is used to verify the signature
     * of the JWT token.
     */
    public readonly string $openEnrollmentJwtSecret;

    /**
     * The ID of the integration used to import data.
     */
    public readonly string $importDataSource;

    /**
     * The ID of the integration used to export data.
     */
    public readonly string $exportDataSource;

    /**
     * The configuration for the import integration.
     */
    public readonly array $importConfig;

    /**
     * The configuration for the export integration.
     */
    public readonly array $exportConfig;

    /**
     * Who (by email) should be notified when a job finishes?
     */
    public readonly string $jobNotifications;

    /**
     * The number of passes created by the campaign.
     */
    public readonly int $passesCount;

    /**
     * The number of passes claimed by the campaign.
     */
    public readonly int $claimedCount;

    /**
     * The number of wallets that registered.
     */
    public readonly int $registeredCount;

    /**
     * The number of enrollments.
     */
    public readonly int $enrolledCount;

    /**
     * Is the campaign deleted?
     */
    public readonly bool $isDeleted;

    /**
     * The Apple pass type identifier, copied from the template.
     */
    public readonly string $passTypeIdentifier;

    /**
     * The Google issuer, copied from the template.
     */
    public readonly string $googleIssuer;

    /**
     * The updatedDate value from the template the last time we pushed changes.
     */
    public readonly \DateTime | null $templateLastChangeDate;

    /**
     * The current updatedDate value from the template.
     */
    public readonly \DateTime | null $templateCurrentChangeDate;

    /**
     * The schedule for the campaign.
     */
    public readonly Schedule | null $schedule;

    /**
     * The ID of the folder the campaign belongs to.
     */
    public readonly string $folder;

    /**
     * The stats for the campaign.
     */
    public readonly CampaignStats $stats;

    /**
     * The browsers that have accessed the campaign.
     */
    public readonly array $browsers;

    /**
     * The countries that have accessed the campaign.
     */
    public readonly array $countries;

    /**
     * The states that have accessed the campaign.
     */
    public readonly array $states;

    /**
     * Constructor.
     *
     * @param array $values The values to set.
     */
    public function __construct(array $values)
    {
        if (isset($values['client'])) {
            $values['organization'] = $values['client'];
            unset($values['client']);
        }
        $this->hydrateProperties($values);
    }
}
