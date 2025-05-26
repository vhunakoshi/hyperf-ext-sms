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

use Vhunakoshi\Sms\Commands\GenSmsCommand;
use Vhunakoshi\Sms\Contracts\SmsManagerInterface;
use Vhunakoshi\Sms\Listeners\ValidatorFactoryResolvedListener;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                SmsManagerInterface::class => SmsManager::class,
            ],
            'commands' => [
                GenSmsCommand::class,
            ],
            'listeners' => [
                ValidatorFactoryResolvedListener::class,
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for hyperf-ext/sms.',
                    'source' => __DIR__ . '/../publish/sms.php',
                    'destination' => BASE_PATH . '/config/autoload/sms.php',
                ],
            ],
        ];
    }
}
