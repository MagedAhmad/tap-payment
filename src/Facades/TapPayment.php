<?php

namespace MagedAhmad\TapPayment\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MagedAhmad\TapPayment\Skeleton\SkeletonClass
 */
class TapPayment extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tap-payment';
    }
}
