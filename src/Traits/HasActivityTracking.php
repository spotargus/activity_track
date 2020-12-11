<?php

namespace ElfR\ActivityTrack\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Trait TracksActivity
 *
 * @package Microfin\ActivityTracking\Traits
 */
trait HasActivityTracking
{
    /**
     * @return MorphMany
     */
    public function activityTracks()
    {
        return $this->morphMany(config('activity-track.models.activity_track'), 'trackable');
    }
}