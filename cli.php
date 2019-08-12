<?php

require 'vendor/autoload.php';
define('ROOT', __DIR__);

$app        = new \App\Application();
$cli        = new \App\ViewCli();
$parameters = new \App\ParamParserCli();

$app->run($cli, $parameters);
