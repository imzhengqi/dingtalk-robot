<?php
namespace zhengqi\dingtalk\robot\container\annotation;

/**
 * TODO
 * @Annotation
 */
class Service
{
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}