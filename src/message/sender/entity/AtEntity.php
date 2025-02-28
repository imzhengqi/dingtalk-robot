<?php
namespace zhengqi\dingtalk\robot\message\entity;

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
     */
    public function setAtMobiles(array $atMobiles): AtEntity
    {
        $this->atMobiles = $atMobiles;
        return $this;
    }

    /**
     * @param array $atUserIds
     */
    public function setAtUserIds(array $atUserIds): AtEntity
    {
        $this->atUserIds = $atUserIds;
        return $this;
    }

    /**
     * @param bool $isAtAll
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
