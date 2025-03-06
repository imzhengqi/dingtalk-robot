<?php

namespace zhengqi\dingtalk\robot\trait;

trait Singleton
{
    /**
     * @var array 存储每个类的唯一实例
     */
    private static array $instances = [];


    /**
     * @return Singleton 获取类的唯一实例
     */
    public static function getInstance(): self
    {
        $className = static::class;
        if (!isset(self::$instances[$className])) {
            self::$instances[$className] = new static();
        }
        return self::$instances[$className];
    }

    /**
     * 禁止外部实例化
     */
    protected function __construct()
    {
    }

    /**
     * 防止外部克隆
     */
    protected function __clone()
    {
    }
    
}
