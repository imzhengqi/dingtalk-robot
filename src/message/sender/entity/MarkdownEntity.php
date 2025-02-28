<?php

namespace zhengqi\dingtalk\robot\message\entity;

/**
 * $data = [
 *      'msgtype' => 'markdown',
 *      'markdown' => [
 *          'title' => 'title',
 *          'text' => 'link text',
 *      ]
 * ];
 */
class MarkdownEntity extends AbstractEntity
{
    private string $title = '';

    private string $content = '';

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
