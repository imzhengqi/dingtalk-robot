<?php

namespace zhengqi\dingtalk\robot\services\message\sender;

use zhengqi\dingtalk\robot\config\Config;
use zhengqi\dingtalk\robot\entity\http\HttpResponse;
use zhengqi\dingtalk\robot\entity\message\sender\query\QuerySignEntity;
use zhengqi\dingtalk\robot\enums\UrlEnum;
use zhengqi\dingtalk\robot\exception\HttpException;
use zhengqi\dingtalk\robot\sign\SignService;
use zhengqi\dingtalk\robot\trait\HttpClient;

/**
 * 消息发送
 */
abstract class AbstractMessageSender implements IMessageSender
{
    use HttpClient;

    protected array $messageBody;

    protected Config $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * 发送消息
     * @param array $messageData
     * @return HttpResponse
     * @throws HttpException
     */
    public function send(array $messageData): HttpResponse
    {
        // 格式化消息
        $this->messageBody = $this->formatMessageBody($messageData);

        // 请求地址
        $url = $this->sendUrl();

        var_dump(PHP_EOL . '---> send message url = ' . PHP_EOL . $url);

        // 发送消息
        $response = $this->post($url, $this->messageBody, [
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);

        var_dump(PHP_EOL . '---> send message result : ' . PHP_EOL);
        var_dump($response);
        return $response;
    }

    private function sendUrl(): string
    {
        $signService = new SignService($this->config);
        $signService->generateSign();

        $querySignEntity = new QuerySignEntity();
        $querySignEntity
            ->setAccessToken($this->config->getAccessToken())
            ->setTimeMillis($signService->getTimeMillis())
            ->setSign($signService->getSign());

        return UrlEnum::robotSendUrl() . '?' . http_build_query($querySignEntity->toArray());
    }

    /**
     * 格式化消息实体
     * @param array $messageData
     * @return array
     */
    abstract protected function formatMessageBody(array $messageData): array;

}
