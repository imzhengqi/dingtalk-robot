<?php
namespace zhengqi\dingtalk\robot\message\sender;

use HttpClient;

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
        return $this->httpClient->post('', $this->messageBody);
    }

    /**
     * 格式化消息实体
     * @param array $messageData
     * @return array
     */
    abstract protected function formatMessageBody(array $messageData): array;

}
