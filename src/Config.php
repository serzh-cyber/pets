<?php

namespace App;

class Config
{
    /**
     * @var array|mixed массив с конфигурациями
     */
    private static $config = null;

    /**
     * Получение данных из configurations.php
     * @return Config|null
     */
    public static function getConfig()
    {
        if (self::$config === null) {
            self::$config = include_once (ROOT  . '/configurations.php');
        }

        return self::$config;
    }

    /**
     * Получение конфигурации по ключу
     * @param $key
     * @return mixed|null
     */
    public static function get($key)
    {
        self::getConfig();
        if (isset(self::$config[$key])) {
            return self::$config[$key];
        } else {
            return null;
        }
    }
}