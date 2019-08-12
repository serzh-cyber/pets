<?php

require 'vendor/autoload.php';
define('ROOT', __DIR__);

$app    = new \App\Application();
$html   = new \App\ViewHtml();
$parameters = new \App\ParamParserHtml();

$app->run($html, $parameters);

