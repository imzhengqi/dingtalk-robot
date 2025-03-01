<?php

namespace zhengqi\dingtalk\robot\sign;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\enums\UrlEnum;
use zhengqi\dingtalk\robot\request\HttpClient;
use zhengqi\dingtalk\robot\request\HttpResponse;

/**
 * 获取 access token 服务
 * 请自行缓存结果
 * 过于频繁请求会遭到拦截
 */
class AccessTokenService
{
    use HttpClient;

    private Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @return HttpResponse
     * @throws \Exception
     */
    public function getAccessToken(): HttpResponse
    {
        $requestData = [
            'appKey' => $this->config->getAppKey(),
            'appSecret' => $this->config->getAppSecret(),
        ];

        $options = [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ];

        return $this->post(UrlEnum::accessTokenUrl(), $requestData, $options);
    }


}
