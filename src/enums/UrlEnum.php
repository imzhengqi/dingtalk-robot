<?php

namespace zhengqi\dingtalk\robot\enums;

enum UrlEnum: string
{
    case ROBOT_SEND_URL = 'https://oapi.dingtalk.com/robot/send'; // 机器人消息
    case API_DOMAIN = 'https://api.dingtalk.com'; // API域名
    case ACCESS_TOKEN_URI = '/v1.0/oauth2/accessToken'; // API获取 access_token

    public static function robotSendUrl(): string
    {
        return self::ROBOT_SEND_URL->value;
    }

    public static function apiDomain(): string
    {
        return self::API_DOMAIN->value;
    }

    public static function accessTokenUrl(): string
    {
        return self::apiDomain() . self::ACCESS_TOKEN_URI->value;
    }

}
