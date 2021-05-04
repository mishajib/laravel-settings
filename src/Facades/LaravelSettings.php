<?php

namespace MISHAJIB\Settings\Facades;


use Illuminate\Support\Facades\Facade;

class LaravelSettings extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'settings';
    }
}
