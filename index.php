<?php

require 'vendor/autoload.php';

$app    = new \App\Application();
$html   = new \App\ViewHtml();
$amount = new \App\AmountHtml();

$app->run($html, $amount);

//asdasddasdasd