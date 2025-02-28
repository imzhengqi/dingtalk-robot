<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc2ca80f570918fb7ee2ac57466f27dac
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitc2ca80f570918fb7ee2ac57466f27dac', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc2ca80f570918fb7ee2ac57466f27dac', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc2ca80f570918fb7ee2ac57466f27dac::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
