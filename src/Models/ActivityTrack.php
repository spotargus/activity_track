<?php


namespace ElfR\ActivityTrack\Models;


use ElfR\ActivityTrack\Contracts\ActivityTrackContract;
use ElfR\ActivityTrack\Objects\ActivityTrackObject;
use ElfR\ActivityTrack\QueryBuilders\ActivityTrackQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Query\Builder;

/**
 * Class ActivityTrack
 *
 * @package ElfR\ActivityTrack\Models
 */
class ActivityTrack extends Model implements ActivityTrackContract
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
     * @return array
     */
    public function getFillable(): array
    {
        $modelId    = (string)config('activity-track.column_names.activity_tracks.model_key');
        $modelType  = (string)config('activity-track.column_names.activity_tracks.trackable_type');
        $type       = (string)config('activity-track.column_names.activity_tracks.tracking_type');

        return [
            $modelId,
            $modelType,
            $type
        ];
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
     * @param ActivityTrackObject $activityTrackObject
     *
     * @return mixed
     */
    public static function create(ActivityTrackObject $activityTrackObject)
    {
        $attributes = [
            config('activity-track.column_names.activity_tracks.model_key') => $activityTrackObject->getTrackedId(),
            config('activity-track.column_names.activity_tracks.model_type') => $activityTrackObject->getTrackedType(),
            config('activity-track.column_names.activity_tracks.tracking_type') => $activityTrackObject->getTrackingAction()
        ];

        return parent::create($attributes);
    }
}