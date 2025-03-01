<?php

namespace zhengqi\dingtalk\robot\enums;

class UrlEnum extends AbstractEnum
{
    const ROBOT_SEND_URL = 'https://oapi.dingtalk.com/robot/send'; // 机器人消息
    const API_DOMAIN = 'https://api.dingtalk.com'; // API域名
    const ACCESS_TOKEN_URI = '/v1.0/oauth2/accessToken'; // API获取 access_token

    public static function robotSendUrl(): string
    {
        return self::ROBOT_SEND_URL;
    }

    public static function apiDomain(): string
    {
        return self::API_DOMAIN;
    }

    public static function accessTokenUrl(): string
    {
        return self::API_DOMAIN . self::ACCESS_TOKEN_URI;
    }

}
