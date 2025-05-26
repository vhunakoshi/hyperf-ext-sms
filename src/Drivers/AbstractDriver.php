<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-ext/sms.
 *
 * @link     https://github.com/vhunakoshi/hyperf-ext-sms
 * @contact  eric@zhu.email
 * @license  https://github.com/vhunakoshi/hyperf-ext-sms/blob/master/LICENSE
 */
namespace Vhunakoshi\Sms\Drivers;

use Hyperf\Config\Config;
use Vhunakoshi\Sms\Client;
use Vhunakoshi\Sms\Contracts\DriverInterface;

abstract class AbstractDriver implements DriverInterface
{
    /**
     * @var \Vhunakoshi\Sms\Client
     */
    protected $client;

    /**
     * @var \Hyperf\Config\Config
     */
    protected $config;

    /**
     * The driver constructor.
     */
    public function __construct(array $config)
    {
        $this->config = new Config($config);
        $this->client = new Client($this->getClientOptions());
    }

    /**
     * Return base Guzzle options.
     */
    protected function getClientOptions(): array
    {
        $options = method_exists($this, 'getGuzzleOptions') ? $this->getGuzzleOptions() : [];

        return array_merge($this->config->get('guzzle', []), $options, [
            'base_uri' => method_exists($this, 'getBaseUri') ? $this->getBaseUri() : '',
            'timeout' => method_exists($this, 'getTimeout') ? $this->getTimeout() : 5.0,
        ]);
    }
}
