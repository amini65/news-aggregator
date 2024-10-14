<?php

namespace App\Services\Preference;

use Illuminate\Support\Facades\Facade;

/**
 * @method static PreferenceService create($inputs)
 * @method static PreferenceService show($user_id)
 */
class Preference extends Facade
{
    public static function getFacadeAccessor()
    {
        return PreferenceServiceInterface::class;
    }
}
