<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-ext/sms.
 *
 * @link     https://github.com/vhunakoshi/hyperf-ext-sms
 * @contact  eric@zhu.email
 * @license  https://github.com/vhunakoshi/hyperf-ext-sms/blob/master/LICENSE
 */
namespace Vhunakoshi\Sms\Events;

use Vhunakoshi\Sms\Contracts\SmsableInterface;

class SmsMessageSending
{
    /**
     * The message instance.
     *
     * @var \Vhunakoshi\Sms\Contracts\SmsableInterface
     */
    public $smsable;

    /**
     * Create a new event instance.
     */
    public function __construct(SmsableInterface $smsable)
    {
        $this->smsable = $smsable;
    }
}
