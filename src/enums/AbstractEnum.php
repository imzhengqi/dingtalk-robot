<?php
namespace zhengqi\dingtalk\robot\enums;

use ReflectionClass;

abstract class AbstractEnum
{
    /**
     * 获取当前类中的所有常量
     * @return array
     */
    public static function getConstants(): array
    {
        $reflectionClass = new ReflectionClass(__CLASS__);
        return $reflectionClass->getConstants();
    }

    /**
     * 不依赖反射，性能较高
     * @return array
     */
    public static function getClassConstants(): array
    {
        $className = __CLASS__;
        // 获取用户定义的常量
        $allConstants = get_defined_constants(true)['user'];

        $classConstants = [];
        foreach ($allConstants as $name => $value) {
            if (str_starts_with($name, $className . '::')) {
                $classConstants[substr($name, strlen($className) + 2)] = $value;
            }
        }

        return $classConstants;
    }

    /**
     * 验证 常量是否存在
     * @param string $enum
     * @return bool
     */
    public static function isExisted(string $enum): bool
    {
        return in_array($enum, self::getClassConstants(), true);
    }
}
