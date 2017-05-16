<?php

class Singleton {
    public static function createInstace() {
        static $obj = null;

        if (null === $obj) {
            $obj = new static();
        }
        return $obj;
    }
    
}

class SingletonChild extends Singleton {
}

$obj = Singleton::createInstace();
var_dump($obj === Singleton::createInstace());

$anotherObj = SingletonChild::createInstace();
var_dump($anotherObj === Singleton::createInstace());
var_dump($anotherObj === SingletonChild::createInstace());
?>