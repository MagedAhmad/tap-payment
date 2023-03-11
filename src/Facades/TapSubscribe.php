<?php

namespace MagedAhmad\TapPayment\Facades;

use Illuminate\Support\Facades\Facade;

class TapSubscribe extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'tap-subscribe';
    }
}
