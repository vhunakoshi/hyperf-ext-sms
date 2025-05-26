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

use GuzzleHttp\Exception\RequestException as GuzzleRequestException;
use Hyperf\Guzzle\ClientFactory;
use Hyperf\Utils\ApplicationContext;
use Vhunakoshi\Sms\Exceptions\RequestException;

class Client
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    public function __construct(array $config = [])
    {
        $this->client = ApplicationContext::getContainer()->get(ClientFactory::class)->create($config);
    }

    /**
     * Make a get request.
     *
     * @throws \Vhunakoshi\Sms\Exceptions\RequestException
     */
    public function get(string $url, array $query = [], array $headers = []): Response
    {
        return $this->request('get', $url, [
            'headers' => $headers,
            'query' => $query,
        ]);
    }

    /**
     * Make a post request.
     *
     * @throws \Vhunakoshi\Sms\Exceptions\RequestException
     */
    public function post(string $url, array $params = [], array $headers = []): Response
    {
        return $this->request('post', $url, [
            'headers' => $headers,
            'form_params' => $params,
        ]);
    }

    /**
     * Make a post request with json params.
     *
     * @throws \Vhunakoshi\Sms\Exceptions\RequestException
     */
    public function postJson(string $endpoint, array $params = [], array $headers = []): Response
    {
        return $this->request('post', $endpoint, [
            'headers' => $headers,
            'json' => $params,
        ]);
    }

    /**
     * Make a http request.
     */
    public function request(string $method, string $endpoint, array $options = []): Response
    {
        try {
            return new Response($this->client->{$method}($endpoint, $options));
        } catch (GuzzleRequestException $e) {
            throw new RequestException(
                $e->getMessage(),
                $e->getRequest(),
                new Response($e->getResponse()),
                $e->getPrevious(),
                $e->getHandlerContext()
            );
        }
    }
}
