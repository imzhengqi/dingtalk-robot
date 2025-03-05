<?php

namespace zhengqi\dingtalk\robot\services\message\sender;

use zhengqi\dingtalk\robot\entity\http\HttpResponse;
use zhengqi\dingtalk\robot\entity\message\sender\query\QuerySignEntity;
use zhengqi\dingtalk\robot\enums\UrlEnum;
use zhengqi\dingtalk\robot\exception\HttpException;
use zhengqi\dingtalk\robot\services\ServiceContainer;
use zhengqi\dingtalk\robot\services\sign\SignService;
use zhengqi\dingtalk\robot\trait\HttpClient;

/**
 * 消息发送
 * @method sign()
 */
abstract class AbstractMessageSender extends ServiceContainer implements IMessageSender
{
    use HttpClient;

    protected array $registerServices = [
        'sign' => SignService::class,
    ];

    /**
     * 消息发送地址
     */
    protected string $sendUrl;

    /**
     * @var array 消息实体
     */
    protected array $messageBody;

    /**
     * 发送消息
     * @param array $messageData
     * @return HttpResponse
     * @throws HttpException
     */
    public function send(array $messageData): HttpResponse
    {
        // 消息实体
        $this->messageBody = $this->formatMessageBody($messageData);
        // 请求地址
        $this->sendUrl = $this->formatSendUrl();
        // 发送消息
        return $this->post($this->sendUrl, $this->messageBody, $this->config->getOptions());
    }

    /**
     * 拼接发送地址
     * @return string
     */
    private function formatSendUrl(): string
    {
        // 1. 生成签名
        $signService = $this->sign()->generate();
        // 2. URL参数
        $querySignEntity = QuerySignEntity::getInstance()
            ->setAccessToken($this->config->getAccessToken())
            ->setTimeMillis($signService->getTimeMillis())
            ->setSign($signService->getSign());
        // 3. 拼接URL地址
        return UrlEnum::robotSendUrl() . '?' . http_build_query($querySignEntity->toArray());
    }

    /**
     * 格式化消息实体
     * @param array $messageData
     * @return array
     */
    abstract protected function formatMessageBody(array $messageData): array;

}
