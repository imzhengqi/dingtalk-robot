<?php

namespace zhengqi\dingtalk\robot\sign;

use zhengqi\dingtalk\robot\config\Config;

class SignService
{
    private int $timeMillis = 0;

    private string $secret = '';

    private string $sign = '';

    private Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;

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
     * @return string
     */
    public function generateSign(): string
    {
        // 拼接签名字符串
        $stringToSign = $this->timeMillis . "\n" . $this->secret;

        // 计算 HMAC-SHA256 签名
        $signData = hash_hmac('sha256', $stringToSign, $this->secret, true);

        // 5. Base64 编码
        $base64Sign = base64_encode($signData);

        // 6. URL 编码
        $this->sign = urlencode($base64Sign);

        return $this->sign;
    }

    /**
     * 当前毫秒级时间
     * @return int
     */
    private function nowTimeMillis(): int
    {
        $time = (int)(microtime(true) * 1000);
        var_dump('---> now time milliseconds: ' . $time . PHP_EOL);
        return $time;
    }

}