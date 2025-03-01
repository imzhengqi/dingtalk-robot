<?php

namespace zhengqi\dingtalk\robot\message\sender\entity\feedCard;

use zhengqi\dingtalk\robot\entity\AbstractEntity;

/**
 * ActionCard消息类型实体
 */
class FeedCardLinkEntity extends AbstractEntity
{

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
