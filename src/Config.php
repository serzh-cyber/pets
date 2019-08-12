<?php

namespace App;

class Config
{
    private static $instance = null;
    private $config = [];

    private function __construct()
    {
        $this->config = include_once (ROOT  . '/configurations.php');
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    public function getConfig($key)
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        } else {
            return null;
        }
    }
}