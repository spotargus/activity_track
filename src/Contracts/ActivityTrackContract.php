<?php


namespace ElfR\ActivityTrack\Contracts;

use ElfR\ActivityTrack\Objects\ActivityTrackObject;

/**
 * Interface ActivityTrackContract
 *
 * @package ElfR\ActivityTrack\Contracts
 */
interface ActivityTrackContract
{
    /**
     * @param ActivityTrackObject $activityTrackObject
     *
     * @return mixed
     */
    public static function createRecord(ActivityTrackObject $activityTrackObject);
}