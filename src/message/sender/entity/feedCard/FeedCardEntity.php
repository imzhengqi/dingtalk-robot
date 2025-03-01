<?php

namespace zhengqi\dingtalk\robot\message\sender\entity\feedCard;

use zhengqi\dingtalk\robot\message\sender\entity\AbstractEntity;

/**
 * ActionCard消息类型实体
 */
class FeedCardEntity extends AbstractEntity
{

    private array $links = [];

    /**
     * @param array $links
     * @return FeedCardEntity
     */
    public function setLinks(array $links): FeedCardEntity
    {
        $this->links = $links;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'links' => $this->links,
        ];
    }
}
