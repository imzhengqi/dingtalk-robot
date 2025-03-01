<?php
namespace zhengqi\dingtalk\robot\message\sender\entity;

use zhengqi\dingtalk\robot\entity\AbstractEntity;

/**
 * $data = [
 *      'msgtype' => 'text',
 *      'text' => [
 *          'content' => 'message content',
 *      ]
 * ];
 */
class TextEntity extends AbstractEntity
{
    private string $content = '';

    /**
     * @param string $content
     */
    public function setContent(string $content): TextEntity
    {
        $this->content = $content;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'content' => $this->content,
        ];
    }
}
