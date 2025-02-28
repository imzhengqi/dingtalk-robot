<?php
namespace zhengqi\dingtalk\robot;

use http\Client\Request;
use HttpClient;

class AccessToken
{
    private $httpClient;

    public function __construct()
    {
        $this->httpClient = new Request();
    }

    public function getAccessToken()
    {
        $httpClient = new HttpClient();
        $httpClient->setHeaders([
            'Content-Type' => 'application/json',
        ]);

        $httpClient->post('https://oapi.dingtalk.com/robot/oauth2/token', [ ]);
    }


}
