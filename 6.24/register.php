<?php
/*
 * 注册模式通过将所有的对象注册到一颗书上，需要的时候再采摘
 * 优点：方便对已经产生的对象进行统筹安排，全部注册到树上，需要的时候再取下来使用
 * */

class Single {
    private static $_instance;
    private function __construct()
    {
        echo '我被实例化啦';
    }
    public static function getInstance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new Single();
        }
        return self::$_instance;
    }
    private function __clone()
    {
        echo 'this class can not be cloned';
    }
}

class randFactory {
    public static function factory() {
        return Single::getInstance();
    }
}

class Register {
    protected static $objects;

    public static function set($mark, $object) {
        self::$objects[$mark] = $object;
    }

    public static function get($mark) {
        return self::$objects[$mark];
    }

    public static function _unset($mark) {
        unset(self::$objects[$mark]);
    }
}