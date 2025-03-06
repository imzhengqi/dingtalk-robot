<?php

namespace zhengqi\dingtalk\robot\trait;

use Swoole\Coroutine\Http\Client;
use zhengqi\dingtalk\robot\entity\http\HttpResponse;

/**
 * 支持 swoole 协程的 HttpClient
 */
trait HttpClient
{
    private array $options = [
        'timeout' => 2, // 超时时间（秒）
        'headers' => [],
    ];

    private HttpResponse $httpResponse;

    /**
     * 发起 GET请求
     *
     * @param string $url 请求的URL
     * @param array $data 查询参数
     * @param array $options 额外选项
     * @return HttpResponse ['status' => int, 'body' => string]
     */
    public function get(string $url, array $data = [], array $options = []): HttpResponse
    {
        return $this->request('GET', $url, $data, $options);
    }

    /**
     * 发起 POST请求
     *
     * @param string $url 请求的URL
     * @param array $data POST数据
     * @param array $options 额外选项
     * @return HttpResponse ['status' => int, 'body' => string]
     */
    public function post(string $url, array $data = [], array $options = []): HttpResponse
    {
        return $this->request('POST', $url, $data, $options);
    }

    /**
     * 发起 HTTP请求
     *
     * @param string $method 请求方法
     * @param string $url 请求的URL
     * @param array $data 请求数据
     * @param array $options 额外选项
     * @return HttpResponse
     */
    private function request(string $method, string $url, array $data, array $options = []): HttpResponse
    {
        $this->isEnabledSwoole();
        $this->createResponse();

        go(function () use ($method, $url, $data, $options) {
            $options = array_merge($this->options, $options);

            // 解析URL
            $parsedUrl = parse_url($url);

            $host = $parsedUrl['host'];
            $port = isset($parsedUrl['scheme']) && $parsedUrl['scheme'] === 'https' ? 443 : ($parsedUrl['port'] ?? 80);
            $ssl = isset($parsedUrl['scheme']) && $parsedUrl['scheme'] === 'https';
            $path = $parsedUrl['path'] ?? '/';
            if (isset($parsedUrl['query'])) {
                $path .= '?' . $parsedUrl['query'];
            }

            $client = new Client($host, $port, $ssl);
            $client->setMethod($method);
            $client->setHeaders($options['headers']);
            $client->set(['timeout' => $options['timeout']]);

            // 根据不同的请求方法设置请求体
            if ($method === 'POST') {
                $client->setData(json_encode($data));
            } elseif ($method === 'GET') {
                $query = http_build_query($data);
                $path .= str_contains($path, '?') ? '&' . $query : '?' . $query;
            }

            // 发送请求
            $client->execute($path);
            $this->httpResponse
                ->setStatusCode($client->statusCode)
                ->setBody(json_decode($client->body, true))
                ->toArray();

            // TODO 记录日志
            $client->close();
        });

        return $this->httpResponse->setStatusCode('200')->setBody([]);
    }

    /**
     * @return HttpResponse
     */
    private function createResponse(): HttpResponse
    {
        $this->httpResponse = new HttpResponse();
        return $this->httpResponse;
    }

    private function isEnabledSwoole(): bool
    {
        if (!extension_loaded('swoole')) {
            throw new \RuntimeException('Swoole extension is required.');
        }
        return true;
    }
}
