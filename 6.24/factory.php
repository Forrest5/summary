<?php
/*
 * 工厂模式是一个返回实例化对象的模式，是用工厂方法替代new操作的模式。
 * 降低了代码的耦合度，有利于代码的动态扩展
 *
 * */
//基类
interface Transport {
    public function go();
}

class Bus implements Transport {
    public function go() {
        echo 'bus每一站都要停';
    }
}
class Car implements Transport {
    public function go() {
        echo 'car跑的飞快';
    }
}
class Bike implements Transport {
    public function go() {
        echo 'bike比较慢';
    }
}

//工厂类
class transFactory {
    public static function factory($transport) {
        switch ($transport){
            case 'bus':
                return new Bus();
                break;
            case 'car':
                return new Car();
                break;
            case 'bike':
                return new Bike();
                break;
        }
    }
}

$transport = transFactory::factory('car');
$transport->go();