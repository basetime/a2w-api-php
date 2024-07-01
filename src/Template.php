<?php

namespace Basetime\A2w;

/**
 * Represents a template from which passes can be created.
 */
class Template
{
    use Hydrator;

    /**
     * The ID of the template.
     */
    public readonly string $id;

    /**
     * The name of the template.
     */
    public readonly string $name;

    /**
     * The version of the template.
     */
    public readonly int $version;

    /**
     * The ID of the version in the database.
     */
    public readonly string $versionID;

    /**
     * The files that are part of the template.
     */
    public readonly array $files;

    /**
     * The URLs of the files that are part of the template.
     */
    public readonly array $templateUrls;

    /**
     * Values related to the Apple version of the template.
     */
    public readonly array $apple;

    /**
     * Values related to the Google version of the template.
     */
    public readonly array $google;

    /**
     * Value that should be used instead of Apple's relevantDate.
     *
     * The relevantDate field is a Date object, but sometimes users need to put
     * {{placeholders}} in the value. This field allows them to do that.
     */
    public readonly string | null $relevantDateOverride;

    /**
     * Value that should be used instead of Apple's expirationDate.
     *
     * The expirationDate field is a Date object, but sometimes users need to put
     * {{placeholders}} in the value. This field allows them to do that.
     */
    public readonly string | null $expirationDateOverride;

    /**
     * The organization the template belongs to.
     */
    public readonly Organization $organization;

    /**
     * The ID of the folder the template belongs to.
     */
    public readonly string $folder;

    /**
     * Unique value that identifies the editing session the template was created in.
     */
    public readonly string $sessionId;

    /**
     * The URL of the screenshot for the template.
     */
    public readonly string | null $screenshotUrl;

    /**
     * The URL of the Apple screenshot for the template.
     */
    public readonly string | null $screenshotAppleUrl;

    /**
     * The URL of the Android screenshot for the template.
     */
    public readonly string | null $screenshotAndroidUrl;

    /**
     * The URL of the PDF for the template.
     */
    public readonly string | null $pdfUrl;

    /**
     * The URL of the Apple PDF for the template.
     */
    public readonly string | null $pdfAppleUrl;

    /**
     * The URL of the Android PDF for the template.
     */
    public readonly string | null $pdfAndroidUrl;

    /**
     * The date the template was updated.
     */
    public readonly \DateTime $updatedDate;

    /**
     * Is the public allowed to view the template?
     *
     * This value comes from the meta, and gets set on the object during transform.
     */
    public readonly bool $isPublicShare;

    /**
     * The current status (e.g. "Ready", "Working", "Review", "Done") of the template.
     *
     * This value comes from the meta, and gets set on the object during transform.
     */
    public readonly string $status;

    /**
     * The user the template is assigned to.
     *
     * This value comes from the meta, and gets set on the object during transform.
     */
    public readonly User | null $assignee;

    /**
     * The user that created the template.
     *
     * This value comes from the meta, and gets set on the object during transform.
     */
    public readonly User | null $createdBy;

    /**
     * List of labels applied to the template.
     *
     * This value comes from the meta, and gets set on the object during transform.
     */
    public readonly array | null $labels;

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
