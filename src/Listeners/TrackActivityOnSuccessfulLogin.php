<?php


namespace ElfR\ActivityTrack\Listeners;


use ElfR\ActivityTrack\Models\ActivityTrack;
use ElfR\ActivityTrack\Objects\ActivityTrackObject;
use Illuminate\Auth\Events\Login;

/**
 * Class TrackActivityOnLogin
 *
 * @package ElfR\ActivityTrack\Listeners
 */
class TrackActivityOnSuccessfulLogin
{
    /**
     * @param Login $event
     */
    public function handle(Login $event)
    {
        $activityTrackObject = new ActicityTrackObject(
            $event->user->id,
            get_class($event->user),
            config('activity-track.tracking_types.success_login')
        );

        ActivityTrack::createRecord($activityTrackObject);
    }
}