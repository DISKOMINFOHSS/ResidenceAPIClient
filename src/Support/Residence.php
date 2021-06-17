<?php

namespace KominfoHSS\Residence\Support;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use RuntimeException;

/**
 * Class Residence
 * @package KominfoHSS\Residence\Support
 *
 * @method static Collection list()
 * @method static Collection personal(int $card)
 * @method static Collection register(int $family)
 * @method static \KominfoHSS\Residence\Residence family()
 */
class Residence extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws RuntimeException
     */
    protected static function getFacadeAccessor() : string
    {
        return 'residence';
    }
}
