<?php


namespace ElfR\ActivityTrack\Traits;

use ElfR\ActivityTrack\Listeners\TrackActivityOnFailedLogin;
use ElfR\ActivityTrack\Listeners\TrackActivityOnSuccessfulLogin;
use Illuminate\Auth\Events\Login;

/**
 * Trait EventMap
 *
 * @package ElfR\ActivityTrack\Traits
 */
trait EventMap
{
    /**
     * @var \string[][]
     */
    protected $events = [
        Login::class => [
            TrackActivityOnSuccessfulLogin::class
        ],
    ];

}