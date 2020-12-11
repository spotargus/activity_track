<?php


namespace ElfR\ActivityTrack\Models;


use ElfR\ActivityTrack\QueryBuilders\ActivityTrackQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Query\Builder;

/**
 * Class ActivityTrack
 *
 * @package ElfR\ActivityTrack\Models
 */
class ActivityTrack extends Model
{
    /**
     * ActivityTrack constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('activity-track.table_names.activity_tracks'));
    }

    /**
     * @param Builder $query
     *
     * @return ActivityTrackQueryBuilder
     */
    public function newEloquentBuilder($query)
    {
        return new ActivityTrackQueryBuilder($query);
    }

    /**
     * @return MorphTo
     */
    public function trackable()
    {
        return $this->morphTo();
    }

}