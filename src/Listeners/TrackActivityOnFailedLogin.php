<?php


namespace ElfR\ActivityTrack\Listeners;

use ElfR\ActivityTrack\Models\ActivityTrack;
use ElfR\ActivityTrack\ValueObjects\ActivityTrackValueObject;
use Illuminate\Auth\Events\Failed;

/**
 * Class TrackActivityOnFailedLogin
 *
 * @package ElfR\ActivityTrack\Listeners
 */
class TrackActivityOnFailedLogin
{
    /**
     * @param Failed $event
     */
    public function handle(Failed $event)
    {
        $activityTrackObject = new ActivityTrackValueObject(
            $event->user->id,
            get_class($event->user),
            config('activity-track.tracking_types.failed_login')
        );

        ActivityTrack::createRecord($activityTrackObject);
    }

}