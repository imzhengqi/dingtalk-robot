<?php

namespace zhengqi\dingtalk\robot\entity\message\sender\feedCard;

use zhengqi\dingtalk\robot\entity\AbstractEntity;

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
