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
    protected $fillable = [];

    /**
     * ActivityTrack constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('activity-track.table_names.activity_tracks'));
        $this->setFillable();
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

    /**
     * @return array
     */
    private function setFillable(): array
    {
        $this->fillable = [
            config('activity-track.column_names.activity_tracks.model_key'),
            config('activity-track.column_names.activity_tracks.trackable_type'),
            config('activity-track.column_names.activity_tracks.tracking_type'),
        ];
    }
}