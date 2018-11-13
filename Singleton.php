<?php
/**
 * 单例模式
 *
 * 保证一个类仅有一个实例，并提供一个访问它的全局访问点
 *
 */

class Singleton
{
    private static $instance;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

$s1 = Singleton::getInstance();
$s2 = Singleton::getInstance();

if ($s1 === $s2) {
    echo '一样的';
}
