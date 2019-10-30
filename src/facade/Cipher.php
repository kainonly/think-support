<?php

namespace think\support\facade;

use think\Facade;

/**
 * Class Cipher
 * @package think\support\facade
 * @method static string encrypt($context)
 * @method static string|array decrypt(string $ciphertext, bool $auto_conver = true)
 */
final class Cipher extends Facade
{
    protected static function getFacadeClass()
    {
        return 'cipher';
    }
}