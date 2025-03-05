<?php

namespace zhengqi\dingtalk\robot\entity\message\sender\actionCard;

use zhengqi\dingtalk\robot\entity\BaseEntity;
use zhengqi\dingtalk\robot\trait\Singleton;

/**
 * ActionCard消息类型实体
 */
class ActionCardEntity extends BaseEntity
{
    use Singleton;

    private string $title = '';

    private string $text = '';

    private string $btnOrientation = '';

    private string $singleTitle = '';

    private string $singleURL = '';

    /**
     * @param string $title
     * @return ActionCardEntity
     */
    public function setTitle(string $title): ActionCardEntity
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $text
     * @return ActionCardEntity
     */
    public function setText(string $text): ActionCardEntity
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param string $btnOrientation
     * @return ActionCardEntity
     */
    public function setBtnOrientation(string $btnOrientation): ActionCardEntity
    {
        $this->btnOrientation = $btnOrientation;
        return $this;
    }

    /**
     * @param string $singleTitle
     * @return ActionCardEntity
     */
    public function setSingleTitle(string $singleTitle): ActionCardEntity
    {
        $this->singleTitle = $singleTitle;
        return $this;
    }

    /**
     * @param string $singleURL
     * @return ActionCardEntity
     */
    public function setSingleURL(string $singleURL): ActionCardEntity
    {
        $this->singleURL = $singleURL;
        return $this;
    }


    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'text' => $this->text,
            'btnOrientation' => $this->btnOrientation,
            'singleTitle' => $this->singleTitle,
            'singleURL' => $this->singleURL,
        ];
    }
}
