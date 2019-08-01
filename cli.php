<?php

require 'vendor/autoload.php';

$app    = new \App\Application();
$cli    = new \App\ViewCli();
$parameters = new \App\ParamParserCli();

$app->run($cli, $parameters);
