<?php

require 'vendor/autoload.php';

$app    = new \App\Application();
$html   = new \App\ViewHtml();
$parameters = new \App\ParamParserHtml();

$app->run($html, $parameters);

