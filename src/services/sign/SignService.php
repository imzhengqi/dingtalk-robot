<?php

namespace zhengqi\dingtalk\robot\services\sign;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\services\ServiceContainer;

class SignService extends ServiceContainer
{
    /**
     * @var int 毫秒级时间戳
     */
    private int $timeMillis = 0;

    /**
     * @var string secret
     */
    private string $secret = '';

    /**
     * @var string 最终签名
     */
    private string $sign = '';

    public function __construct(Config $config)
    {
        parent::__construct($config);
        $this->secret = $config->getSecret();
        $this->timeMillis = $this->nowTimeMillis();
    }

    /**
     * @return int
     */
    public function getTimeMillis(): int
    {
        return $this->timeMillis;
    }

    /**
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }


    /**
     * 生成签名
     * @return SignService
     */
    public function generate(): self
    {
        // 1. 拼接签名字符串
        $stringToSign = $this->timeMillis . "\n" . $this->secret;

        // 2. 计算 HMAC-SHA256 签名
        $signData = hash_hmac('sha256', $stringToSign, $this->secret, true);

        // 3. Base64 编码
        $base64Sign = base64_encode($signData);

        // 4. URL 编码
        $this->sign = urlencode($base64Sign);

        return $this;
    }

    /**
     * 当前毫秒级时间
     * @return int
     */
    private function nowTimeMillis(): int
    {
        return (int)(microtime(true) * 1000);
    }

}