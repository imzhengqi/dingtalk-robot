<?php

namespace zhengqi\dingtalk\robot\request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use zhengqi\dingtalk\robot\exception\HttpException;

/**
 * HttpClient
 */
trait HttpClient
{
    private array $options = [
        'timeout' => 30, // 超时时间（秒）
    ];

    private Client $httpClient;

    /**
     * @param Client $httpClient
     * @return HttpClient|mixed
     */
    public function setHttpClient(Client $httpClient): self
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * @return Client
     */
    public function getHttpClient(): Client
    {
        return $this->httpClient ?? new Client();
    }

    /**
     * @return HttpResponse
     */
    private function createResponse(): HttpResponse
    {
        return new HttpResponse();
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $data
     * @param array $options
     * @return HttpResponse
     * @throws HttpException
     */
    private function request(string $method, string $url, array $data, array $options = []): HttpResponse
    {
        $options = array_merge($this->options, $options);

        if ($method === 'GET') {
            // GET 请求将数据附加到 URL
            $url .= (!str_contains($url, '?') ? '?' : '&') . http_build_query($data);
        } else {
            // 其他请求方法将数据作为请求体
            $options['json'] = $data;
        }

        try {
            $response = $this->getHttpClient()->request($method, $url, $options);

            return $this->createResponse()
                ->setStatusCode($response->getStatusCode())
                ->setBody(
                    json_decode($response->getBody()->getContents(), true)
                );
        } catch (GuzzleException $e) {
            throw new HttpException("HTTP request failed: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string $url
     * @param array $data
     * @param array $options
     * @return HttpResponse
     * @throws HttpException
     */
    public function get(string $url, array $data = [], array $options = []): HttpResponse
    {
        return $this->request('GET', $url, $data, $options);
    }

    /**
     * @param string $url
     * @param array $data
     * @param array $options
     * @return HttpResponse
     * @throws HttpException
     */
    public function post(string $url, array $data = [], array $options = []): HttpResponse
    {
        return $this->request('POST', $url, $data, $options);
    }
}