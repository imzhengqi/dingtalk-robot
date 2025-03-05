<?php

namespace zhengqi\dingtalk\robot\entity\message\sender\feedCard;

use zhengqi\dingtalk\robot\entity\BaseEntity;
use zhengqi\dingtalk\robot\trait\Singleton;

/**
 * ActionCard消息类型实体
 */
class FeedCardEntity extends BaseEntity
{
    use Singleton;

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
