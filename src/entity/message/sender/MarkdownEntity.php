<?php

namespace zhengqi\dingtalk\robot\entity\message\sender;

use zhengqi\dingtalk\robot\entity\BaseEntity;
use zhengqi\dingtalk\robot\trait\Singleton;

/**
 * $data = [
 *      'msgtype' => 'markdown',
 *      'markdown' => [
 *          'title' => 'title',
 *          'text' => 'link text',
 *      ]
 * ];
 */
class MarkdownEntity extends BaseEntity
{
    use Singleton;

    private string $title = '';

    private string $text = '';

    /**
     * @param string $title
     */
    public function setTitle(string $title): MarkdownEntity
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): MarkdownEntity
    {
        $this->text = $text;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'text' => $this->text,
        ];
    }
}
