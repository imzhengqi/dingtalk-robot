<?php
namespace zhengqi\dingtalk\robot\message\entity;

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
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @param string $picUrl
     */
    public function setPicUrl(string $picUrl): void
    {
        $this->picUrl = $picUrl;
    }

    /**
     * @param string $messageUrl
     */
    public function setMessageUrl(string $messageUrl): void
    {
        $this->messageUrl = $messageUrl;
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
