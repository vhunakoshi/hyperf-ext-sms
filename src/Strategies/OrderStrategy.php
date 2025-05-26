<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-ext/sms.
 *
 * @link     https://github.com/vhunakoshi/hyperf-ext-sms
 * @contact  eric@zhu.email
 * @license  https://github.com/vhunakoshi/hyperf-ext-sms/blob/master/LICENSE
 */
namespace Vhunakoshi\Sms\Strategies;

use Vhunakoshi\Sms\Concerns\HasSenderFilter;
use Vhunakoshi\Sms\Contracts\MobileNumberInterface;
use Vhunakoshi\Sms\Contracts\StrategyInterface;

class OrderStrategy implements StrategyInterface
{
    use HasSenderFilter;

    public function apply(array $senders, MobileNumberInterface $number): array
    {
        return array_values($this->filterSenders($senders, $number));
    }
}
