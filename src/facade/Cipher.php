<?php

namespace think\support\facade;

use think\extra\contract\CipherInterface;
use think\Facade;

/**
 * Class Cipher
 * @package think\support\facade
 * @method static string encrypt(string|array $context)
 * @method static string|array decrypt(string $ciphertext, bool $auto_conver = true)
 */
class Cipher extends Facade
{
    protected static function getFacadeClass()
    {
        return CipherInterface::class;
    }
}