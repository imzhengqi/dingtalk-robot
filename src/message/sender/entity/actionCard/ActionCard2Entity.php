<?php

namespace zhengqi\dingtalk\robot\message\sender\entity\actionCard;

use zhengqi\dingtalk\robot\message\sender\entity\AbstractEntity;

/**
 * ActionCard消息类型实体
 */
class ActionCard2Entity extends AbstractEntity
{
    private string $title = '';

    private string $text = '';

    private string $btnOrientation = '';

    private array $btns = [];

    /**
     * @param string $title
     * @return ActionCard2Entity
     */
    public function setTitle(string $title): ActionCard2Entity
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $text
     * @return ActionCard2Entity
     */
    public function setText(string $text): ActionCard2Entity
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param string $btnOrientation
     * @return ActionCard2Entity
     */
    public function setBtnOrientation(string $btnOrientation): ActionCard2Entity
    {
        $this->btnOrientation = $btnOrientation;
        return $this;
    }

    /**
     * @param array $btns
     * @return ActionCard2Entity
     */
    public function setBtns(array $btns): ActionCard2Entity
    {
        $this->btns = $btns;
        return $this;
    }


    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'text' => $this->text,
            'btnOrientation' => $this->btnOrientation,
            'btns' => $this->btns,
        ];
    }
}
