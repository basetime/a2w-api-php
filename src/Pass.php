<?php

namespace Basetime\A2w;

/**
 * Information needed to generate a pass.
 */
class Pass
{
    use Hydrator;

    /**
     * The pass ID.
     */
    public readonly string $id;

    /**
     * The ID of the job that created the pass.
     */
    public readonly string $jobId;

    /**
     * The serial number of the pass.
     *
     * The serial number is important to updating wallets.
     */
    public readonly string $serialNumber;

    /**
     * The data stored inside the pass.
     *
     * This data typically comes from a csv file.
     */
    public readonly array $data;

    /**
     * MD5 of the data for easier comparison.
     */
    public readonly string $dataMD5;

    /**
     * The value of the primary key in the data.
     */
    public readonly string $primaryKey;

    /**
     * The campaign the pass belongs to.
     */
    public readonly Campaign $campaign;

    /**
     * The template ID.
     */
    public readonly string $templateId;

    /**
     * The template version.
     */
    public readonly int $templateVersion;

    /**
     *
     */
    public readonly string $enrollment;

    /**
     * The ID request log that claimed the pass.
     */
    public readonly string $requestLog;

    /**
     * The ID of the saved google object.
     */
    public readonly string $googleObjectId;

    /**
     * Whether the pass has been claimed.
     */
    public readonly bool $isClaimed;

    /**
     * The date the pass was created
     */
    public readonly int $createdMillis;

    /**
     * The date the pass was last updated.
     */
    public readonly \DateTime $updatedDate;

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
