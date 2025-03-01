<?php
namespace zhengqi\dingtalk\robot\message\sender\entity;

/**
 * $data = [
 *      'msgtype' => 'link',
 *      'link' => [
 *          'title' => 'title title',
 *          'text' => 'link text',
 *          'picUrl' => 'picurl image url',
 *          'messageUrl' => 'message message url',
 *      ]
 * ];
 */
class LinkEntity extends AbstractEntity
{
    private string $title = '';

    private string $text = '';

    private string $picUrl = '';

    private string $messageUrl = '';

    /**
     * @param string $title
     * @return LinkEntity
     */
    public function setTitle(string $title): LinkEntity
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $text
     * @return LinkEntity
     */
    public function setText(string $text): LinkEntity
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param string $picUrl
     * @return LinkEntity
     */
    public function setPicUrl(string $picUrl): LinkEntity
    {
        $this->picUrl = $picUrl;
        return $this;
    }

    /**
     * @param string $messageUrl
     * @return LinkEntity
     */
    public function setMessageUrl(string $messageUrl): LinkEntity
    {
        $this->messageUrl = $messageUrl;
        return $this;
    }


    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'text' => $this->text,
            'picUrl' => $this->picUrl,
            'messageUrl' => $this->messageUrl,
        ];
    }
}
