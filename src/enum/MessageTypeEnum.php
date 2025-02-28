<?php
namespace zhengqi\dingtalk\robot\enum;

final class MessageTypeEnum extends AbstractEnum
{
    const TEXT = 'text';
    const LINK = 'link';
    const MARKDOWN = 'markdown';
    const ACTION_CARD = 'actionCard';
    const ACTION_CARD_2 = 'actionCard';
    const FEED_CARD = 'feedCard';


    // 防止实例化
    private function __construct()
    {
    }


}