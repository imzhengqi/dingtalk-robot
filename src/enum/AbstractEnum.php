<?php
namespace zhengqi\dingtalk\robot\enum;

use ReflectionClass;

abstract class AbstractEnum
{
    /**
     * 获取当前类中的所有常量
     * @return array
     */
    public static function getConstants(): array
    {
        $reflectionClass = new ReflectionClass(self::class);
        return $reflectionClass->getConstants();
    }

    /**
     * 验证 常量是否存在
     * @param string $enum
     * @return bool
     */
    public static function isExisted(string $enum): bool
    {
        return in_array($enum, self::getConstants(), true);
    }
}
