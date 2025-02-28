<?php

class HttpClient
{
    // 默认配置
    private $options = [
        'timeout' => 30, // 超时时间（秒）
        'headers' => [], // 请求头
        'verify_ssl' => true, // 是否验证 SSL 证书
        'follow_redirects' => true, // 是否跟随重定向
        'user_agent' => 'HttpClient/1.0', // 默认 User-Agent
    ];

    private array $headers = [];

    /**
     * 构造函数
     * @param array $options 配置选项
     */
    public function __construct(array $options = [])
    {
        $this->options = array_merge($this->options, $options);
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->options['headers'] = array_merge($this->options['headers'], $headers);
    }

    /**
     * 发送 HTTP 请求
     * @param string $method 请求方法（GET、POST、PUT、DELETE 等）
     * @param string $url 请求 URL
     * @param array $data 请求数据
     * @param array $options 请求配置（覆盖全局配置）
     * @return array 返回响应数据和状态码
     * @throws Exception 如果请求失败
     */
    public function request(string $method, string $url, array $data = [], array $options = []): array
    {
        // 合并全局配置和局部配置
        $options = array_merge($this->options, $options);

        // 创建请求对象
        $request = new http\Client\Request($method, $url, $options['headers']);

        // 设置请求数据
        if (!empty($data)) {
            if ($method === 'GET') {
                // GET 请求将数据附加到 URL
                $url .= (strpos($url, '?') === false ? '?' : '&') . http_build_query($data);
                $request->setRequestUrl($url);
            } else {
                // 其他请求方法将数据作为请求体
                $request->setBody(new http\Message\Body(http_build_query($data)));
            }
        }

        // 设置超时时间
        $request->setOptions([
            'timeout' => $options['timeout'],
        ]);

        // 是否验证 SSL 证书
        $request->setOptions([
            'ssl' => [
                'verifypeer' => $options['verify_ssl'],
                'verifyhost' => $options['verify_ssl'] ? 2 : 0,
            ],
        ]);

        // 是否跟随重定向
        $request->setOptions([
            'followlocation' => $options['follow_redirects'],
        ]);

        // 设置 User-Agent
        $request->setOptions([
            'useragent' => $options['user_agent'],
        ]);

        // 创建 HTTP 客户端
        $client = new http\Client();
        $client->enqueue($request);

        // 发送请求
        try {
            $client->send();
        } catch (Exception $e) {
            throw new Exception("HTTP request failed: " . $e->getMessage());
        }

        // 获取响应
        $response = $client->getResponse($request);

        return [
            'status_code' => $response->getResponseCode(),
            'body' => $response->getBody()->toString(),
        ];
    }

    /**
     * 发送 GET 请求
     * @param string $url 请求 URL
     * @param array $query 查询参数
     * @param array $options 请求配置（覆盖全局配置）
     * @return array 返回响应数据和状态码
     * @throws Exception 如果请求失败
     */
    public function get(string $url, array $query = [], array $options = []): array
    {
        return $this->request('GET', $url, $query, $options);
    }

    /**
     * 发送 POST 请求
     * @param string $url 请求 URL
     * @param array $data 请求数据
     * @param array $options 请求配置（覆盖全局配置）
     * @return array 返回响应数据和状态码
     * @throws Exception 如果请求失败
     */
    public function post(string $url, array $data = [], array $options = []): array
    {
        return $this->request('POST', $url, $data, $options);
    }

    /**
     * 发送 PUT 请求
     * @param string $url 请求 URL
     * @param array $data 请求数据
     * @param array $options 请求配置（覆盖全局配置）
     * @return array 返回响应数据和状态码
     * @throws Exception 如果请求失败
     */
    public function put(string $url, array $data = [], array $options = []): array
    {
        return $this->request('PUT', $url, $data, $options);
    }

    /**
     * 发送 DELETE 请求
     * @param string $url 请求 URL
     * @param array $data 请求数据
     * @param array $options 请求配置（覆盖全局配置）
     * @return array 返回响应数据和状态码
     * @throws Exception 如果请求失败
     */
    public function delete(string $url, array $data = [], array $options = []): array
    {
        return $this->request('DELETE', $url, $data, $options);
    }
}