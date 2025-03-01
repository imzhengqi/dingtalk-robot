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
        echo '---> current classname ' . __CLASS__ . PHP_EOL;
        echo '---> current classname ' . static::class . PHP_EOL;
        $reflectionClass = new ReflectionClass(static::class);
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

        var_dump('---> all constants' . PHP_EOL);
        var_dump($allConstants);

        $classConstants = [];
        foreach ($allConstants as $name => $value) {
            if (str_starts_with($name, $className . '::')) {
                $classConstants[substr($name, strlen($className) + 2)] = $value;
            }
        }

        var_dump($classConstants);

        return $classConstants;
    }
}
