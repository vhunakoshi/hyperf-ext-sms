<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-ext/sms.
 *
 * @link     https://github.com/vhunakoshi/hyperf-ext-sms
 * @contact  eric@zhu.email
 * @license  https://github.com/vhunakoshi/hyperf-ext-sms/blob/master/LICENSE
 */
namespace Vhunakoshi\Sms\Contracts;

interface SenderInterface
{
    /**
     * Get the sender name.
     */
    public function getName(): string;

    /**
     * Send the message immediately.
     *
     * @throws \Vhunakoshi\Sms\Exceptions\DriverErrorException
     */
    public function send(SmsableInterface $smsable): array;
}
