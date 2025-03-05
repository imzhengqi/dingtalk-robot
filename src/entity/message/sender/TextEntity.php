<?php
namespace zhengqi\dingtalk\robot\entity\message\sender;

use zhengqi\dingtalk\robot\entity\BaseEntity;
use zhengqi\dingtalk\robot\trait\Singleton;

/**
 * $data = [
 *      'msgtype' => 'text',
 *      'text' => [
 *          'content' => 'message content',
 *      ]
 * ];
 */
class TextEntity extends BaseEntity
{
    use Singleton;

    private string $content = '';

    /**
     * @param string $content
     * @return TextEntity
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
