<?php


namespace Zcold\Settlement\Traits;

trait Singleton
{
    static private $instance;

    /**
     * 防止使用new直接创建对象
     */
    private function __clone(){}

    /**
     * @return self
     */
    static public function getInstance()
    {
        //判断$instance是否是Singleton的对象，不是则创建
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}