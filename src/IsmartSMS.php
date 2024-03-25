<?php

namespace S4D\Laravel\IsmartSMS;

use Illuminate\Support\Facades\Facade;
use S4D\Laravel\IsmartSMS\Services\IsmartSMSService;

/**
 * @method static bool SendSMS(string $receiver, string $message)
 * @method static array getRawResults()
 * @method static void setFlashSMS()
 * @method static void unsetFlashSMS()
 */
class IsmartSMS extends Facade {
    protected static function getFacadeAccessor() {
        return IsmartSMSService::class;
    }
}
