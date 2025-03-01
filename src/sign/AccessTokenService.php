<?php

namespace zhengqi\dingtalk\robot\sign;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\entity\AccessTokenEntity;
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
     * @return AccessTokenEntity
     */
    private function getAccessTokenEntity(): AccessTokenEntity
    {
        return new AccessTokenEntity();
    }

    /**
     * 格式化输出
     * @param HttpResponse $response
     * @return AccessTokenEntity
     */
    private function formatAccessToken(HttpResponse $response): AccessTokenEntity
    {
        $accessTokenEntity = $this->getAccessTokenEntity();
        if ($response->getStatusCode() == '200') {
            $accessTokenEntity->setAccessToken($response['accessToken'])
                ->setExpireIn($response['expireIn']);
        }
        return $accessTokenEntity;
    }

    /**
     * @return AccessTokenEntity
     * @throws \Exception
     */
    public function getAccessToken(): AccessTokenEntity
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

        // 请求结果
        $response = $this->post(UrlEnum::accessTokenUrl(), $requestData, $options);
        // 格式化输出
        return $this->formatAccessToken($response);
    }
}
