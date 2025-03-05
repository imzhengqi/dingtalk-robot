<?php

namespace zhengqi\dingtalk\robot\entity\message\sender\actionCard;

use zhengqi\dingtalk\robot\entity\BaseEntity;
use zhengqi\dingtalk\robot\trait\Singleton;

/**
 * ActionCard消息类型的按钮实体
 */
class ActionCardBtnEntity extends BaseEntity
{
    use Singleton;

    private string $title = '';

    private string $actionURL = '';


    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): ActionCardBtnEntity
    {
        $this->title = $title;
        return $this;
    }


    /**
     * @param string $actionURL
     * @return ActionCardBtnEntity
     */
    public function setActionURL(string $actionURL): ActionCardBtnEntity
    {
        $this->actionURL = $actionURL;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'actionURL' => $this->actionURL,
        ];
    }
}
