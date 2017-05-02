<?php

namespace AhmedAsh95\WPBAuth;

use Illuminate\Support\Facades\Facade;

class WPBAuthFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'wp-bauth';
    }
}
