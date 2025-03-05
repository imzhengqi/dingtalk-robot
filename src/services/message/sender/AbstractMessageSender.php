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
        $response = $this->post($this->sendUrl, $this->messageBody, [
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);
        var_dump(PHP_EOL . '---> send message result : ' . PHP_EOL);
        var_dump($response);
        return $response;
    }

    private function formatSendUrl(): string
    {
        $signService = $this->sign()->generate();

        $querySignEntity = QuerySignEntity::getInstance()
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
