<?php

namespace ElfR\ActivityTrack\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class ActivityTrackQueryBuilder
 *
 * @package ElfR\ActivityTrack\QueryBuilders
 */
class ActivityTrackQueryBuilder extends Builder
{
    /**
     * @param string $type
     *
     * @return ActivityTrackQueryBuilder
     */
    public function getByTrackingType(string $type)
    {
        return $this->where(config('activity-track.column_names.activity_tracks.tracking_type'), $type);
    }
}