<?php
/*
 * 单例模式要点：
 * 1.一个类只能创建一个实例
 * 2.它必须自行创建这个实例
 * 3.它必须自行向整个系统提供这个实例
 * */
class man {
    private static $_instance;

    private function __construct()
    {
        echo '我被实例化啦';
    }

    public static function getInstance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new man();
        }

        return self::$_instance;
    }

    private function __clone()
    {
        echo 'This class can not be clone';
    }
}

$res = man::getInstance();
var_dump($res);

/*
 * php为什么要用单利模式：
 * 1.PHP中单利模式经常用于数据库应用，在面向对象的开发中，需要大量的数据库操作，此时用单利模式，可以节省大量new操作消耗的资源，同时避免数据库连接过多；
 * 2.如果一个系统中需要一个类来控制全局设置信息，单利模式是个很好的选择。
 * */