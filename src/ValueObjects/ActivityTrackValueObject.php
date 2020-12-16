<?php


namespace ElfR\ActivityTrack\ValueObjects;

/**
 * Class ActivityTrackValueObject
 *
 * @package ElfR\ActivityTrack\ValueObjects
 */
class ActivityTrackValueObject
{
    /**
     * @var string
     */
    private $trackedId;
    /**
     * @var string
     */
    private $trackedType;
    /**
     * @var string
     */
    private $trackingAction;

    /**
     * ActivityTrackValueObject constructor.
     *
     * @param string $trackedId
     * @param string $trackedType
     * @param string $trackingAction
     */
    public function __construct(string $trackedId, string $trackedType, string $trackingAction)
    {
        $this->trackedId = $trackedId;
        $this->trackedType = $trackedType;
        $this->trackingAction = $trackingAction;
    }

    /**
     * @return string
     */
    public function getTrackingAction(): string
    {
        return $this->trackingAction;
    }

    /**
     * @return string
     */
    public function getTrackedId(): string
    {
        return $this->trackedId;
    }

    /**
     * @return string
     */
    public function getTrackedType(): string
    {
        return $this->trackedType;
    }
}