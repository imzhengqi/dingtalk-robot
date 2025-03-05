<?php

namespace zhengqi\dingtalk\robot\services\sign;

use zhengqi\dingtalk\robot\entity\AccessTokenEntity;
use zhengqi\dingtalk\robot\entity\http\HttpResponse;
use zhengqi\dingtalk\robot\enums\UrlEnum;
use zhengqi\dingtalk\robot\services\ServiceContainer;
use zhengqi\dingtalk\robot\trait\HttpClient;

/**
 * 获取 access token 服务
 * 请自行缓存结果
 * 过于频繁请求会遭到拦截
 */
class AccessTokenService extends ServiceContainer
{
    use HttpClient;

    /**
     * @return AccessTokenEntity
     */
    private function getEntity(): AccessTokenEntity
    {
        return new AccessTokenEntity();
    }

    /**
     * 格式化输出
     * @param HttpResponse $response
     * @return AccessTokenEntity
     */
    private function formatEntity(HttpResponse $response): AccessTokenEntity
    {
        $accessTokenEntity = $this->getEntity();
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
    public function get(): AccessTokenEntity
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
        return $this->formatEntity($response);
    }
}
