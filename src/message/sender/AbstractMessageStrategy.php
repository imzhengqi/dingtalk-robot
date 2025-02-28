<?php
namespace zhengqi\dingtalk\robot\message;

use HttpClient;

abstract class AbstractMessageStrategy implements MessageStrategy
{
    protected HttpClient $httpClient;

    public function __construct()
    {
        $this->httpClient = new HttpClient();
        $this->httpClient->setHeaders([
            'Content-Type' => 'application/json',
        ]);
    }

}
