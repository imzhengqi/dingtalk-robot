<?php

namespace zhengqi\dingtalk\robot\entity\message\sender\feedCard;

use zhengqi\dingtalk\robot\entity\BaseEntity;
use zhengqi\dingtalk\robot\trait\Singleton;

/**
 * ActionCard消息类型实体
 */
class FeedCardLinkEntity extends BaseEntity
{
    use Singleton;

    private string $title = '';

    private string $messageURL = '';

    private string $picURL = '';


    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): FeedCardLinkEntity
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $messageURL
     * @return $this
     */
    public function setMessageURL(string $messageURL): FeedCardLinkEntity
    {
        $this->messageURL = $messageURL;
        return $this;
    }

    /**
     * @param string $picURL
     * @return $this
     */
    public function setPicURL(string $picURL): FeedCardLinkEntity
    {
        $this->picURL = $picURL;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'messageURL' => $this->messageURL,
            'picURL' => $this->picURL,
        ];
    }
}
