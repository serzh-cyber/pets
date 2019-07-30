<?php

require 'vendor/autoload.php';

$app    = new \App\Application();
$cli    = new \App\ViewCli();
$amount = new \App\AmountCli();

$app->run($cli, $amount);
