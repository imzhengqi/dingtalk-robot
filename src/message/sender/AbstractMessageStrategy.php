<?php
namespace zhengqi\dingtalk\robot\message\sender;

use HttpClient;
use zhengqi\dingtalk\robot\enums\UrlEnum;

abstract class AbstractMessageStrategy implements MessageStrategy
{
    protected HttpClient $httpClient;

    protected array $messageBody;

    public function __construct()
    {
        $this->httpClient = new HttpClient();
        $this->httpClient->setHeaders([
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * 发送消息
     * @param array $messageData
     * @return array
     * @throws \Exception
     */
    public function sendMessage(array $messageData): array
    {
        // 格式化消息
        $this->messageBody = $this->formatMessageBody($messageData);
        // 发送消息
        return $this->httpClient->post($this->sendUrl(), $this->messageBody);
    }

    private function sendUrl(): string
    {
        return UrlEnum::robotSendUrl();
    }

    /**
     * 格式化消息实体
     * @param array $messageData
     * @return array
     */
    abstract protected function formatMessageBody(array $messageData): array;

}
