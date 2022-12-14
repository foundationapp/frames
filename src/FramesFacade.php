<?php

namespace Foundationapp\Frames;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Foundationapp\Frames\Skeleton\SkeletonClass
 */
class FramesFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'frames';
    }
}
