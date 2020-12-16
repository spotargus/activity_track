<?php


namespace ElfR\ActivityTrack\Contracts;

use ElfR\ActivityTrack\ValueObjects\ActivityTrackValueObject;

/**
 * Interface ActivityTrackContract
 *
 * @package ElfR\ActivityTrack\Contracts
 */
interface ActivityTrackContract
{
    /**
     * @param ActivityTrackValueObject $activityTrackObject
     *
     * @return mixed
     */
    public static function createRecord(ActivityTrackValueObject $activityTrackObject);
}