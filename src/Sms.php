<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-ext/sms.
 *
 * @link     https://github.com/vhunakoshi/hyperf-ext-sms
 * @contact  eric@zhu.email
 * @license  https://github.com/vhunakoshi/hyperf-ext-sms/blob/master/LICENSE
 */
namespace Vhunakoshi\Sms;

use Hyperf\Utils\ApplicationContext;
use Vhunakoshi\Contract\HasMailAddress;
use Vhunakoshi\Sms\Contracts\SmsManagerInterface;

/**
 * @method static \Vhunakoshi\Sms\PendingSms to(HasMailAddress|string $number, null|int|string $defaultRegion = null)
 */
class Sms
{
    public static function __callStatic(string $method, array $args)
    {
        $instance = static::getManager();

        return $instance->{$method}(...$args);
    }

    public static function sender(string $name)
    {
        return (new PendingSms(static::getManager()))->sender($name);
    }

    protected static function getManager()
    {
        return ApplicationContext::getContainer()->get(SmsManagerInterface::class);
    }
}
