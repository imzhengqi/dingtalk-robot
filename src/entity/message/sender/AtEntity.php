<?php
namespace zhengqi\dingtalk\robot\entity\message\sender;

use zhengqi\dingtalk\robot\entity\AbstractEntity;

/**
 * 消息 @指定用户
 */
class AtEntity extends AbstractEntity
{
    private array $atMobiles = [];

    private array $atUserIds = [];

    private bool $isAtAll = false;

    /**
     * @param array $atMobiles
     * @return AtEntity
     */
    public function setAtMobiles(array $atMobiles): AtEntity
    {
        $this->atMobiles = $atMobiles;
        return $this;
    }

    /**
     * @param array $atUserIds
     * @return AtEntity
     */
    public function setAtUserIds(array $atUserIds): AtEntity
    {
        $this->atUserIds = $atUserIds;
        return $this;
    }

    /**
     * @param bool $isAtAll
     * @return AtEntity
     */
    public function setIsAtAll(bool $isAtAll): AtEntity
    {
        $this->isAtAll = $isAtAll;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'atMobiles' => $this->atMobiles,
            'atUserIds' => $this->atUserIds,
            'isAtAll' => $this->isAtAll,
        ];
    }
}
